<?php
namespace App\Livewire\Customer;

use App\Models\LoanPayment;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class PaymentRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $loan_id;

    public function mount()
    {
        $this->loan_id = request('id');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(LoanPayment::query()->where('loan_id', $this->loan_id))
            ->columns([
                TextColumn::make('created_at')->date()->label('DATE OF PAYMENT'),
                TextColumn::make('amount')->label('AMOUNT')->formatStateUsing(
                    fn($record) => '₱' . number_format($record->amount, 2)
                ),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.customer.payment-record');
    }
}
