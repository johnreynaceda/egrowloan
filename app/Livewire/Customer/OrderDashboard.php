<?php

namespace App\Livewire\Customer;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use Filament\Notifications\Notification;
use Livewire\Component;

class OrderDashboard extends Component
{
    public $menu_name;
    public $menu_id;
    public $menuss = []; 
    public $quantity = 1;
    public $order_modal = false;
    public function render()
    {
        return view('livewire.customer.order-dashboard',[
            'menus' => Category::all()
        ]);
    }

    public function showOrderModal($menu_id){
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

    public function addToCart(){
        sleep(1);
        Order::create([
            'user_id' => auth()->user()->id,
            'menu_id' => $this->menu_id,
            'quantity' => $this->quantity,
        ]);
        $this->quantity = 1;
        $this->order_modal = false;
        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();

            $this->dispatch('order-created');
    }
}
