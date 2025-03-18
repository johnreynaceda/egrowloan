<?php
namespace App\Livewire;

use App\Models\Member;
use App\Models\User;
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

class MemberList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Member::query())->headerActions([
            CreateAction::make('new')->label('New Member')->icon('heroicon-o-plus')->color('success')->action(
                function ($data) {
                    $user = User::create([
                        'name'      => $data['firstname'] . ' ' . $data['lastname'],
                        'email'     => $data['email'],
                        'password'  => bcrypt($data['password']),
                        'user_type' => 'staff',
                    ]);

                    Member::create([
                        'firstname' => $data['firstname'],
                        'lastname'  => $data['lastname'],
                        'address'   => $data['address'],
                        'contact'   => $data['contact'],
                        'user_id'   => $user->id,
                    ]);
                }
            )->form([
                Fieldset::make('MEMBER INFORMATION')->schema([
                    TextInput::make('firstname')->required(),
                    TextInput::make('lastname')->required(),
                    TextInput::make('address')->required(),
                    TextInput::make('contact')->required(),
                ]),
                Fieldset::make('USER INFORMATION')->schema([

                    TextInput::make('email')->email()->required(),
                    TextInput::make('password')->password()->required(),

                ]),
            ])->modalWidth('2xl')->modalHeading('Create Member'),
        ])
            ->columns([
                TextColumn::make('firstname')->label('FULLNAME')->formatStateUsing(
                    fn($record) => ucfirst($record->firstname) . ' ' . ucfirst($record->lastname)
                )->searchable(),
                TextColumn::make('user.email')->label('EMAIL')->searchable(),
                TextColumn::make('address')->label('ADDRESS')->searchable(),
                TextColumn::make('contact')->label('CONTACT')->searchable(),
                TextColumn::make('user.user_type')->label('USER TYPE')->formatStateUsing(
                    fn($record) => ucfirst($record->user->user_type)
                )->searchable(),
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
        return view('livewire.member-list');
    }
}
