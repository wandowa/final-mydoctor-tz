<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Blog Page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(BlogPost::class, 'slug')
                    ->maxLength(255),
                Forms\Components\Select::make('category')
                    ->options([
                        'health-topics' => 'Health Topics',
                        'health-news' => 'Health News',
                    ])
                    ->required()
                    ->reactive() // Allows dynamic updates based on selection
                    ->default('health-topics'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('blog-images'),
                Forms\Components\RichEditor::make('introduction')
                    ->required()
                    ->toolbarButtons(['bold', 'italic', 'underline', 'bulletList', 'orderedList', 'link'])
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('body_content')
                    ->required()
                    ->toolbarButtons(['bold', 'italic', 'underline', 'bulletList', 'orderedList', 'link'])
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image2')
                    ->image()
                    ->directory('blog-images'),
                Forms\Components\RichEditor::make('another_content')
                    ->required()
                    ->toolbarButtons(['bold', 'italic', 'underline', 'bulletList', 'orderedList', 'link'])
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image3')
                    ->image()
                    ->directory('blog-images'),
                Forms\Components\RichEditor::make('conclusion')
                    ->required()
                    ->toolbarButtons(['bold', 'italic', 'underline', 'bulletList', 'orderedList', 'link'])
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('faqs')
                    ->schema([
                        Forms\Components\TextInput::make('question')
                            ->required(),
                        Forms\Components\RichEditor::make('answer')
                            ->required()
                            ->toolbarButtons(['bold', 'italic', 'underline', 'bulletList', 'orderedList', 'link']),
                    ])
                    ->minItems(4)
                    ->maxItems(4)
                    ->defaultItems(4)
                    ->hidden(fn ($get) => $get('category') !== 'health-topics'), // Show only for health-topics
                Forms\Components\TextInput::make('author')
                    ->default('Dr. Wandowa Titus'),
                Forms\Components\DateTimePicker::make('published_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable(),
                Tables\Columns\TextColumn::make('category'),
                Tables\Columns\TextColumn::make('published_at')->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'health-topics' => 'Health Topics',
                        'health-news' => 'Health News',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }
}