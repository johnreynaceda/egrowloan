<?php
namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Menu;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class MenuList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $categories = [];

    public function table(Table $table): Table
    {
        return $table
            ->query(Menu::query())->headerActions([
            Action::make('category')->label('New Category')->icon('heroicon-o-squares-plus')->url(fn(): string => route('admin.category')),
           
            CreateAction::make('create')->label('New Menu')->icon('heroicon-o-plus')->form([
                TextInput::make('name')->required(),
                TextInput::make('amount')->required()->numeric(),
                Select::make('category_id')->label('Category')->options(Category::all()->pluck('name', 'id'))->required(),

            ])->color('success')->modalWidth('xl'),
        ])
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable(),
                TextColumn::make('amount')->label('AMOUNT')->formatStateUsing(
                    fn($record) => '₱' . number_format($record->amount, 2)
                )->searchable(),
                TextColumn::make('category.name')->label('CATEGORY')->searchable(),
                TextColumn::make('quantity')->label('STOCKS')->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    TextInput::make('name')->required(),
                    TextInput::make('amount')->required()->numeric(),
                    Select::make('category_id')->label('Category')->options(Category::all()->pluck('name', 'id'))->required(),
                ])->modalWidth('xl'),
                Action::make('stock')->color('success')->action(
                    function ($record, $data) {
                        $record->update([
                            'quantity' => $data['quantity'],
                        ]);
                    }
                )->form(
                    function ($record) {
                        return [
                            TextInput::make('quantity')->required()->numeric()->default($record->quantity),
                        ];
                    }
                )->modalWidth('xl'),
                DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Menu yet')->emptyStateDescription('Once you write your first menu, it will appear here.');
    }

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.admin.menu-list');
    }
}
