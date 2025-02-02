<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Transaction;
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

    public $carts = [];
    public $quantity = 1;
    public function render()
    {
        if ($this->transaction_id ) {
            $data = Order::where('transaction_id', $this->transaction_id)->get();
       
        $this->cart = $data;
        }else{
            
            $data = Order::where('transaction_id', null)->where('status', 0)->get();
            $this->carts = $data;
        }

        return view('livewire.admin.point-of-sale', [
            'orders' => Transaction::where('status', 'pending')->get(),
            'categories' => Category::get(),
            'products' => Menu::when($this->active_cat, function($record){
                return $record->where('category_id', $this->active_cat);
            })->get(),
        ]);
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

}
