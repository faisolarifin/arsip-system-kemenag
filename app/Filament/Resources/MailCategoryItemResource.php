<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MailCategoryItemResource\Pages;
use App\Models\MailCategoryItem;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;

class MailCategoryItemResource extends Resource
{
    protected static ?string $model = MailCategoryItem::class;

    protected static ?int $navigationSort = 4;
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    protected static ?string $navigationLabel = 'Item Group Kategori';
    protected static ?string $pluralModelLabel = 'Item Kategori';
    protected static ?string $modelLabel = 'Item Kategori';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Item Kategori Surat')
                ->description('Silakan isi data item kategori surat.')
                ->schema([
                    Grid::make(2)->schema([
                        Select::make('group_id')
                            ->label('Grup Kategori')
                            ->relationship('group', 'category_name')
                            ->searchable()
                            ->required(),

                        TextInput::make('category_code')
                            ->label('Kode Item')
                            ->required()
                            ->unique(ignoreRecord: true),
                    ]),

                    Grid::make(1)->schema([
                        TextInput::make('category_name')
                            ->label('Nama Item')
                            ->required(),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3),
                    ]),
                ])
                ->columns(1)
                ->collapsible(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('group.category_name')->label('Grup')->searchable(),
            TextColumn::make('category_code')->label('Kode')->searchable(),
            TextColumn::make('category_name')->label('Nama')->searchable(),
            TextColumn::make('description')
                ->label('Deskripsi')
                ->wrap()
                ->extraAttributes([
                    'class' => 'whitespace-normal max-w-xs',
                ])->searchable(),
        ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMailCategoryItems::route('/'),
            'create' => Pages\CreateMailCategoryItem::route('/create'),
            'edit' => Pages\EditMailCategoryItem::route('/{record}/edit'),
        ];
    }
}
