<?php

namespace App\Livewire;

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

class UserList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())->headerActions([
                CreateAction::make('new')->label('New User')->icon('heroicon-o-plus')->color('success')->form([
                    TextInput::make('name')->required(),
                    TextInput::make('email')->email()->required(),
                    TextInput::make('password')->password()->required(),
                    Select::make('user_type')->options([
                        'staff' => 'Staff',
                        'customer' => 'Customer',
                    ])
                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable(),
                TextColumn::make('email')->label('EMAIL')->searchable(),
                TextColumn::make('user_type')->label('USER TYPE')->formatStateUsing(
                    fn($record) => ucfirst($record->user_type)
                )->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success'),
                DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.user-list');
    }
}
