<?php

namespace App\Livewire\Admin;

use App\Models\LoanTerm;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class LoanTermList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(LoanTerm::query())->headerActions([
                CreateAction::make('new')->icon('heroicon-o-plus')->form([
                    TextInput::make('name')->required(),
                    TextInput::make('monthly_interest')->prefix('%')->required(),
                    TextInput::make('number_of_months')->required(),
                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('name')->label('TERM')->searchable(),
                TextColumn::make('monthly_interest')->label('MONTHLY INTEREST')->searchable(),
                TextColumn::make('number_of_months')->label('# OF MONTHS')->searchable(),
               
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // Action::make('view')->label('VIEW LOAN')->button()->color('success')->icon('heroicon-s-document-text'),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.loan-term-list');
    }
}
