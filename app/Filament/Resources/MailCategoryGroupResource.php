<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MailCategoryGroupResource\Pages;
use App\Models\MailCategoryGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;

class MailCategoryGroupResource extends Resource
{
    protected static ?string $model = MailCategoryGroup::class;

    protected static ?int $navigationSort = 3;
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';
    protected static ?string $navigationLabel = 'Grup Kategori';
    protected static ?string $pluralModelLabel = 'Grup Kategori';
    protected static ?string $modelLabel = 'Group Kategori';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Grup Kategori Surat')
                ->description('Silakan isi data grup kategori surat.')
                ->schema([
                    Grid::make(2)->schema([
                        Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'category_name')
                            ->required(),

                        TextInput::make('category_code')
                            ->label('Kode Grup')
                            ->required()
                            ->unique(ignoreRecord: true),
                    ]),

                    TextInput::make('category_name')
                        ->label('Nama Grup')
                        ->required()
                        ->columnSpanFull(),
                ])
                ->columns(1)
                ->collapsible(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.category_name')->label('Kategori')->searchable(),
                TextColumn::make('category_code')->label('Kode Grup')->searchable(),
                TextColumn::make('category_name')->label('Nama Grup')->searchable(),
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
            'index' => Pages\ListMailCategoryGroups::route('/'),
            'create' => Pages\CreateMailCategoryGroup::route('/create'),
            'edit' => Pages\EditMailCategoryGroup::route('/{record}/edit'),
        ];
    }
}
