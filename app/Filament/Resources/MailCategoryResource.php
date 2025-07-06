<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MailCategoryResource\Pages;
use App\Models\MailCategory;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;

class MailCategoryResource extends Resource
{
    protected static ?string $model = MailCategory::class;

    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $navigationLabel = 'Kategori Surat';
    protected static ?string $modelLabel = 'Kategori';
    protected static ?string $pluralModelLabel = 'Kategori Surat';

    public static function form(Form $form): Form
    {

        return $form->schema([
            Section::make('Kategori Surat')
                ->description('Masukkan informasi dasar untuk kategori surat.')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('category_code')
                            ->label('Kode Kategori')
                            ->required()
                            ->unique(ignoreRecord: true),

                        TextInput::make('category_name')
                            ->label('Nama Kategori')
                            ->required(),
                    ]),
                ])
                ->columns(1)
                ->collapsible(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category_code')->label('Kode')->searchable(),
                TextColumn::make('category_name')->label('Nama')->searchable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
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
            'index' => Pages\ListMailCategories::route('/'),
            'create' => Pages\CreateMailCategory::route('/create'),
            'edit' => Pages\EditMailCategory::route('/{record}/edit'),
        ];
    }
}
