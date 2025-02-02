<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerNavbar extends Component
{


    #[On('order-created')]
    public function render()
    {
        return view('livewire.customer-navbar',[
            'cart' => Order::where('status', 0)->get(),
        ]);
    }

    public function removeToCart($id){
        Order::where('id', $id)->first()->delete();
    }

    public function checkout($subtotal){
        sleep(4);
        $trans = Transaction::create([
            'order_number' => mt_rand(100000, 999999),
            'user_id' => auth()->user()->id,
            'total_amount' => $subtotal,
        ]);

        $data = Order::where('status', 0)->get();
        foreach ($data as $key => $value) {
            $value->update([
                'transaction_id' => $trans->id,
                'status' => 1,
            ]);
            # code...
        }


    }
}
