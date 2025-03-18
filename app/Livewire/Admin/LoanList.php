<?php

namespace App\Livewire\Admin;

use App\Jobs\PaymentReminder;
use App\Models\Loan;
use App\Models\LoanPayment;
use App\Models\Shop\Product;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class LoanList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Loan::query()->orderBy('created_at', 'desc'))->columns([
                TextColumn::make('member.user.name')->label('NAME')->searchable(),
                TextColumn::make('amount')->label('LOAN AMOUNT')->formatStateUsing(
                    fn($record) => '₱'. number_format($record->amount, 2)
                )->searchable(),
                TextColumn::make('status')->label('STATUS')->badge()->searchable()->color(fn(string $state): string => match ($state){
                    'pending' => 'warning',
                    'approved' => 'primary',
                   'rejected' => 'danger',
                }),
                TextColumn::make('payment_status')->label('PAYMENT STATUS')->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('approve')->label('Approve Loan')->color('success')->icon('heroicon-c-hand-thumb-up')->action(
                        function($record) {
                            $record->update(['status' => 'approved', 'payment_status' => 'active']);
                            $loan = $record;

                            $monthly_interest = $loan->amount * ($loan->loanTerm->monthly_interest / 100) ;
                            $total_interest = $monthly_interest * $loan->loanTerm->number_of_months;
                            $monthly_payment = $loan->amount / $loan->loanTerm->number_of_months;
                            $total_payment = $loan->loanPayments->sum('amount');
                            $remaining_payment = $loan->amount + $total_interest - $total_payment;

                            $monthly_now = $monthly_payment + $monthly_interest;

                            PaymentReminder::dispatch($record->member->contact, $monthly_now, now()->addMonth())->delay(now()->addMinutes(2));
                        }
                    ),
                    Action::make('reject')->label('Reject Loan')->color('danger')->icon('heroicon-c-hand-thumb-down')->action(
                        function($record) {
                            $record->update(['status' =>'rejected']);
                        }
                    )
                ])->visible(fn($record) => $record->status == 'pending')
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.loan-list',[
            'requests' => Loan::where('status', 'pending')->count(),
            'approved' => Loan::where('status', 'approved')->count(),
        ]);
    }
}
