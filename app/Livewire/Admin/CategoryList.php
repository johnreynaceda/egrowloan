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

class CategoryList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;


    public function table(Table $table): Table
    {
        return $table
            ->query(Category::query())->headerActions([
            Action::make('back')->icon('heroicon-o-arrow-left')->color('gray')->url(fn() => route('admin.menu')),
            CreateAction::make('create')->label('New Category')->icon('heroicon-o-plus')->form([
                TextInput::make('name')->required(),
            ])->color('success')->modalWidth('xl'),
        ])
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable(),
                
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    TextInput::make('name')->required(),
                ])->modalWidth('xl'),
               
                // DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Category yet')->emptyStateDescription('Once you write your first category, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.category-list');
    }
}
