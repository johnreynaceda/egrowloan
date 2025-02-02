<?php

namespace App\Livewire\Customer;

use App\Models\Loan;
use App\Models\Shop\Product;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class MyLoan extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $loan;

    public function table(Table $table): Table
    {
        return $table
            ->query(Loan::query()->where('member_id', auth()->user()->member->id)->orderByDesc('id'))->headerActions([
                CreateAction::make('new')->label('New Loan')->icon('heroicon-o-plus')->color('success')->action(
                    function($data){
                        Loan::create([
                            'member_id' => auth()->user()->member->id,
                            'amount' => $data['amount'],
                        ]);
                    }
                )->form([
                    TextInput::make('amount')->required()->label('Loan Amount')->prefix('₱')->numeric()
                ])->modalWidth('xl')->modalHeading('Request for Loan')
            ])
            ->columns([
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
                // EditAction::make('edit')->color('success'),
                DeleteAction::make('delete')->visible(fn($record) => $record->status == 'pending'),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        $this->loan = Loan::where('member_id', auth()->user()->member->id)->where('status', 'approved')->first();
        return view('livewire.customer.my-loan');
    }
}
