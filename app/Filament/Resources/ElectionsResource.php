<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ElectionsResource\Pages;
use App\Filament\Resources\ElectionsResource\RelationManagers;
use App\Models\Elections;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ElectionsResource extends Resource
{
    protected static ?string $model = Elections::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';
    protected static ?string $navigationLabel = 'Elections';
    protected static ?string $modelLabel = 'Elections';
    protected static ?string $navigationGroup = 'Data Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(Auth()->user()->id),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('start_date')
                    ->required()
                    ->native(false),
                Forms\Components\DatePicker::make('end_date')
                    ->required()
                    ->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Start Date')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('Expired Date')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Delete Item')
                    ->modalDescription('Are you sure you\'d like to delete this? This cannot be undone.')
                    ->modalSubmitActionLabel('Yes, delete it')
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Successfully deleted')
                            ->body('The Election has been deleted successfully.'),
                    ),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListElections::route('/'),
            'create' => Pages\CreateElections::route('/create'),
            'edit' => Pages\EditElections::route('/{record}/edit'),
        ];
    }
}
