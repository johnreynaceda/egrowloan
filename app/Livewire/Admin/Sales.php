<?php

namespace App\Livewire\Admin;

use App\Models\Transaction;
use Livewire\Component;

class Sales extends Component
{
    public function render()
    {
        return view('livewire.admin.sales', [
            'saless' => Transaction::where('status', 'paid')->get(),
        ]);
    }
}
