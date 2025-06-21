<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuardianResource\Pages;
use App\Models\Guardian;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class GuardianResource extends Resource
{
    protected static ?string $model = Guardian::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'About Us';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('guardians')
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->maxSize(2048) // 2MB limit
                    ->saveUploadedFileUsing(function ($file, $state, $set) {
                        $extension = strtolower($file->getClientOriginalExtension());
                        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.jpg';
                        $path = 'guardians/' . $filename;

                        if ($extension === 'heic') {
                            // Convert .HEIC to JPEG
                            $image = Image::make($file);
                            Storage::disk('public')->put($path, $image->encode('jpg', 90));
                        } else {
                            // Save .jpg or .png directly
                            $file->storeAs('guardians', $filename, 'public');
                        }

                        // Set the stored path in the model
                        $set('image', $path);

                        return $path;
                    }),
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\Textarea::make('description')->nullable()->rows(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->getStateUsing(function ($record) {
                        return Storage::disk('public')->exists($record->image) ? $record->image : 'placeholder.jpg';
                    }),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description')->limit(50),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGuardians::route('/'),
        ];
    }
}