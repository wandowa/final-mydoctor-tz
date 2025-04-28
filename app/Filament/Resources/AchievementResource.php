<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AchievementResource\Pages;
use App\Models\Achievement;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;

class AchievementResource extends Resource
{
    protected static ?string $model = Achievement::class;
    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static ?string $navigationGroup = 'Home Page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('trainees')->numeric()->required(),
                Forms\Components\TextInput::make('clients')->numeric()->required(),
                Forms\Components\TextInput::make('projects')->numeric()->required(),
                Forms\Components\TextInput::make('awards')->numeric()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('trainees'),
                Tables\Columns\TextColumn::make('clients'),
                Tables\Columns\TextColumn::make('projects'),
                Tables\Columns\TextColumn::make('awards'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAchievements::route('/'),
        ];
    }
}