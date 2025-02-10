<?php
namespace App\Livewire\Staff;

use App\Models\LoanPayment;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class MyPayment extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(LoanPayment::query()->whereHas('loan', function ($query) {
                $query->where('member_id', auth()->user()->member->id);
            }))
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
        return view('livewire.staff.my-payment');
    }
}
