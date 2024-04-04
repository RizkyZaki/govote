<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OptionsResource\Pages;
use App\Filament\Resources\OptionsResource\RelationManagers;
use App\Models\Options;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OptionsResource extends Resource
{
    protected static ?string $model = Options::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box-arrow-down';
    protected static ?string $navigationLabel = 'Option';
    protected static ?string $modelLabel = 'Option Elections';
    protected static ?string $navigationGroup = 'Data Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('elections_id')
                    ->relationship(name: 'elections', titleAttribute: 'title')
                    ->searchable()
                    ->preload()
                    ->native(false),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('elections.title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListOptions::route('/'),
            'create' => Pages\CreateOptions::route('/create'),
            'view' => Pages\ViewOptions::route('/{record}'),
            'edit' => Pages\EditOptions::route('/{record}/edit'),
        ];
    }
}
