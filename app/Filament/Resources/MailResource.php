<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MailResource\Pages;
use App\Models\Mail;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;

class MailResource extends Resource
{
    protected static ?string $model = Mail::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Arsip Surat';
    protected static ?string $pluralModelLabel = 'Arsip Surat';
    protected static ?string $navigationGroup = 'Arsip';
    protected static ?string $modelLabel = 'Arsip';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Informasi Umum')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('mail_number')
                            ->label('Nomor Surat')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('subject')
                            ->label('Perihal')
                            ->required()
                            ->maxLength(255),
                    ]),

                    Grid::make(2)->schema([
                        Select::make('mail_type')
                            ->label('Jenis Surat')
                            ->options([
                                'incoming' => 'Surat Masuk',
                                'outgoing' => 'Surat Keluar',
                            ])
                            ->required(),

                        TextInput::make('classification_code')
                            ->label('Kode Klasifikasi'),
                    ]),
                ])
                ->columns(1)
                ->collapsible(),

            Section::make('Klasifikasi Surat')
                ->schema([
                    Grid::make(3)->schema([
                        Select::make('category_id')
                            ->relationship('category', 'category_name')
                            ->label('Kategori'),

                        Select::make('group_id')
                            ->relationship('group', 'category_name')
                            ->label('Grup'),

                        Select::make('item_id')
                            ->relationship('item', 'category_name')
                            ->label('Item'),
                    ]),
                ])
                ->columns(1)
                ->collapsible(),

            Section::make('Informasi Pengirim & Penerima')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('sender_name')
                            ->label('Nama Pengirim'),

                        TextInput::make('receiver_name')
                            ->label('Nama Penerima'),
                    ]),

                    Grid::make(2)->schema([
                        Textarea::make('sender_address')
                            ->label('Alamat Pengirim'),

                        Textarea::make('receiver_address')
                            ->label('Alamat Penerima'),
                    ]),
                ])
                ->columns(1)
                ->collapsible(),

            Section::make('Tanggal & Keamanan')
                ->schema([
                    Grid::make(3)->schema([
                        DatePicker::make('mail_date')
                            ->label('Tanggal Surat')
                            ->required(),

                        DatePicker::make('received_date')
                            ->label('Tanggal Diterima'),

                        DatePicker::make('archived_date')
                            ->label('Tanggal Arsip')
                            ->required(),
                    ]),

                    Grid::make(2)->schema([
                        Select::make('confidentiality_level')
                            ->label('Tingkat Keamanan')
                            ->options([
                                'biasa' => 'Biasa',
                                'rahasia' => 'Rahasia',
                                'sangat rahasia' => 'Sangat Rahasia',
                            ]),

                        Select::make('mail_status')
                            ->label('Status Surat')
                            ->options([
                                'arsip' => 'Arsip',
                                'proses' => 'Proses',
                                'selesai' => 'Selesai',
                            ]),
                    ]),
                ])
                ->columns(1)
                ->collapsible(),

            Section::make('File Lampiran')
                ->schema([
                    Grid::make(2)->schema([
                        FileUpload::make('file_path')
                            ->label('File Surat')
                            ->directory('surat'),

                        TextInput::make('file_type')
                            ->label('Tipe File'),
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
                Tables\Columns\TextColumn::make('mail_number')->label('No Surat')->searchable(),
                Tables\Columns\TextColumn::make('subject')->label('Perihal')->searchable(),
                Tables\Columns\TextColumn::make('mail_type')
                    ->label('Jenis')
                    ->searchable()
                    ->formatStateUsing(fn(string $state) => match ($state) {
                        'incoming' => 'Surat Masuk',
                        'outgoing' => 'Surat Keluar',
                        default => '-',
                    }),
                Tables\Columns\TextColumn::make('category.category_name')->label('Kategori')->searchable(),
                Tables\Columns\TextColumn::make('mail_date')->label('Tanggal')->date(),
                Tables\Columns\TextColumn::make('mail_status')
                    ->label('Status')
                    ->formatStateUsing(fn(string $state) => ucfirst($state)),
            ])
            ->groups([
                Group::make('mail_date')
                    ->label('Tanggal Surat')
                    ->collapsible(),
            ])
            ->filters([
                SelectFilter::make('mail_status')
                    ->label('Status Surat')
                    ->options([
                        'arsip' => 'Arsip',
                        'proses' => 'Proses',
                        'selesai' => 'Selesai',
                    ])
                    ->placeholder('Semua Status'),
            ])
            ->actions([
                Action::make('view')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->url(fn($record) => route('filament.admin.resources.mails.view', $record)),

                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMails::route('/'),
            'create' => Pages\CreateMail::route('/create'),
            'edit' => Pages\EditMail::route('/{record}/edit'),
            'view' => Pages\ViewMail::route('/{record}'),
        ];
    }
}
