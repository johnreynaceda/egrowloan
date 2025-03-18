<?php

namespace App\Livewire\Admin;

use App\Models\Loan;
use App\Models\Menu;
use App\Models\Transaction;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Report extends Component implements HasForms
{
    use InteractsWithForms;

    public $selected_report;
    public $filter;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
              Grid::make(6)->schema([
                Select::make('selected_report')->label('Report Type')->options([
                    'Sales' => 'Sales',
                    'Members Loan' => 'Members Loan',
                    'Inventory' => 'Inventory'
                   ])->reactive(),
                   Select::make('filter')->label('Filter By')->options([
                    'Student' => 'Student',
                    'Coop Member' => 'Coop Member',
                   ])->visible(fn($record) => $this->selected_report == 'Sales')->reactive(),
              ])
            ]);
    }
    public function render()
    {
        return view('livewire.admin.report',[
            'saless' => Transaction::when($this->filter, function($record){
               switch ($this->filter) {
                case 'Student':
                $record->whereHas('user', function ($userQuery) {
                    $userQuery->where('user_type', 'Staff')
                              ->doesntHave('member'); // Select users without member
                });
                break;
    
            case 'Coop Member':
                $record->whereHas('user.member'); // Select users with member
                break;
               }
            })->where('status', 'paid')->get(),
            'loans' => Loan::get(),
            'menus' => Menu::get(),
        ]);
    }
}
