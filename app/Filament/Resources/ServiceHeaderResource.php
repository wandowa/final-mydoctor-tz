<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceHeaderResource\Pages;
use App\Models\ServiceHeader;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;

class ServiceHeaderResource extends Resource
{
    protected static ?string $model = ServiceHeader::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo'; // Updated to valid Heroicons v2 icon

    protected static ?string $navigationGroup = 'Services Page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('background_image')
                    ->image()
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->rows(5),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('background_image'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageServiceHeaders::route('/'),
        ];
    }
}