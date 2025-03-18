<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Transaction;
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Livewire\Component;
use Flasher\SweetAlert\Prime\SweetAlertInterface;


class PointOfSale extends Component
{
    public $order_modal = false;
    public $active_cat;
    public $menu_id;
    public $menuss;
    public $transaction_id;
    public $cart = [];
    public $transaction;

    public $carts = [];
    public $quantity = 1;
    public function render()
    {
        if ($this->transaction_id ) {
            $data = Order::where('transaction_id', $this->transaction_id)->get();
            $this->transaction = Transaction::where('id', $this->transaction_id)->first();
       
        $this->cart = $data;
        }else{
            
            $data = Order::where('transaction_id', null)->where('status', 0)->get();
            $this->carts = $data;
        }

        return view('livewire.admin.point-of-sale', [
            'orders' => Transaction::where('status', '!=','paid')->get(),
            'categories' => Category::get(),
            'products' => Menu::when($this->active_cat, function($record){
                return $record->where('category_id', $this->active_cat);
            })->get(),
        ]);
    }

    public function approveOrder($id){
        $data = Transaction::where('id', $id)->first();
        
        $data->update(attributes: [
           'status' => 'approved'
        ]);

        $this->sendSms($data->user->contact, 'Your order has been approved, Please go to the counter to pay your order.');

    }

    public function removeToCart($id){
        Order::where('id', $id)->first()->delete();
        $this->cart = Order::where('transaction_id', $this->transaction_id)->get();
    }

    public function viewOrder($id){
       
        $data = Order::where('transaction_id', $id)->get();
        $this->transaction_id = $id;
        $this->cart = $data;
    }

    public function showOrderModal($menu_id){
       if ($this->cart) {
        $this->menu_id = $menu_id;
        $this->menuss = Menu::where('id', $this->menu_id)->first();

        if ($this->menuss->quantity > 0) {
            $this->order_modal = true;
        }else{
            Notification::make()
            ->title('No Stocks Available')
            ->danger()
            ->send();

        }
       }else{
        $this->menu_id = $menu_id;
        $this->menuss = Menu::where('id', $this->menu_id)->first();

        if ($this->menuss->quantity > 0) {
            $this->order_modal = true;
        }else{
            Notification::make()
            ->title('No Stocks Available')
            ->danger()
            ->send();

        }
       }
    }

     public function addToCart(){
        sleep(1);
       if ($this->transaction_id) {
        $data = Order::where('transaction_id', $this->transaction_id)->first();
        $menusintransaction = Order::where('transaction_id', $this->transaction_id)->whereIn('menu_id', [$this->menu_id])->get();
        
        if ($menusintransaction->count() > 0) {
            $menusintransaction->first()->update([
                'quantity' => $menusintransaction->first()->quantity + $this->quantity
            ]);
        }else{
        Order::create([
            'transaction_id' => $this->transaction_id,
            'user_id' => $data->user_id,
            'menu_id' => $this->menu_id,
            'quantity' => $this->quantity
        ]);
        
        }
        $this->quantity = 1;
        $this->order_modal = false;
       }else{

        // $data = Order::where('transaction_id', $this->transaction_id)->first();
        $menusintransaction = Order::where('transaction_id', null)->where('status', 0)->whereIn('menu_id', [$this->menu_id])->get();
       
        // Order::create([
    
        //     'menu_id' => $this->menu_id,
        //     'quantity' => $this->quantity
        // ]);

        if ($menusintransaction->count() > 0) {
            $menusintransaction->first()->update([
                'quantity' => $menusintransaction->first()->quantity + $this->quantity
            ]);
        }else{
        Order::create([
            'menu_id' => $this->menu_id,
            'quantity' => $this->quantity
        ]);
       
        }
        $this->quantity = 1;
        $this->order_modal = false;
       }
    }

    public function proceedPayment($total){
        sleep(2);
       if ($this->transaction_id) {
        $data = Order::where('transaction_id', $this->transaction_id)->get();

        foreach ($data as $key => $value) {
            $value->update([
                'status' => 1,
            ]);
        }
        
        $transaction = Transaction::where('id', $this->transaction_id)->first();
        $transaction->update([
            'total_amount' => $total,
            'status' => 'paid',
        ]);

        $this->sendSms($transaction->user->contact, 'Your order is ready.');
        
       }else{
        $trans = Transaction::create([
            'order_number' => mt_rand(100000, 999999),
            // 'user_id' => auth()->user()->id,
            'total_amount' => $total,
            'status' => 'paid',
        ]);

        foreach ($this->carts as $key => $value) {
            $value->update([
                'transaction_id' => $trans->id,
               'status' => 1,
            ]);
            
            $value->menu->update([
                'quantity' => $value->menu->quantity - $value->quantity,
            ]);
        }
       }

     

       sweetalert()->success('Order was created successfully');
        return redirect()->route('admin.pos');
    }


    public function sendSms($contact, $message){
        try {
            $ch         = curl_init();
            $parameters = [
                'apikey'     => '1aaad08e0678a1c60ce55ad2000be5bd', //Your API KEY
                'number'     => $contact,
                'message'    => "eGROWLOANS SMS \n\n" .  
"Dear Customer," . "\n\n" .$message .", Thank You.",

                'sendername' => 'SEGU',
            ];
            curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
            curl_setopt($ch, CURLOPT_POST, 1);

            //Send the parameters set above with the request
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

            // Receive response from server
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception(curl_error($ch)); // Catch any curl errors
            }

            curl_close($ch);

            \Log::info('Semaphore SMS Response: ' . $output);

        } catch (\Exception $e) {
            \Log::error('SMS Sending Failed: ' . $e->getMessage());
        }
    }

}
