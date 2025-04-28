<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisionResource\Pages;
use App\Models\Vision;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;

class VisionResource extends Resource
{
    protected static ?string $model = Vision::class;
    protected static ?string $navigationIcon = 'heroicon-o-eye';

    protected static ?string $navigationGroup = 'About Us';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\Textarea::make('description')->required()->rows(5),
                Forms\Components\Repeater::make('bullet_points')
                    ->schema([
                        Forms\Components\TextInput::make('point')->required(),
                    ])
                    ->label('Bullet Points')
                    ->defaultItems(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageVisions::route('/'),
        ];
    }
}