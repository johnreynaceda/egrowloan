<?php
namespace App\Livewire\Customer;

use App\Models\Transaction;
use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CustomerTransaction extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Transaction::query()->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc'))->columns([
            TextColumn::make('order_number')->label('ORDER NO.')->searchable(),
            TextColumn::make('total_amount')->label('TOTAL ')->searchable()->formatStateUsing(
                fn($record) => '₱' . number_format($record->total_amount, 2)
            ),
            TextColumn::make('status')->label('STATUS')->searchable()->badge()->color(fn(string $state): string => match ($state) {
                'pending'                                                                                           => 'warning',
                'paid'                                                                                              => 'success',
                'disapprove'                                                                                        => 'danger',
            }),

        ])
            ->filters([
                // ...
            ])
            ->actions([
                // ActionGroup::make([
                //     Action::make('approve')->label('Approve Loan')->color('success')->icon('heroicon-c-hand-thumb-up')->action(
                //         function($record) {
                //             $record->update(['status' => 'approved', 'payment_status' => 'active']);

                //         }
                //     ),
                //     Action::make('reject')->label('Reject Loan')->color('danger')->icon('heroicon-c-hand-thumb-down')->action(
                //         function($record) {
                //             $record->update(['status' =>'rejected']);
                //         }
                //     )
                // ])->visible(fn($record) => $record->status == 'pending')
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.customer.customer-transaction');
    }
}
