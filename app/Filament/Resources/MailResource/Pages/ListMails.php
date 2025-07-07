<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

class ListMails extends ListRecords
{
    protected static string $resource = MailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

      public function getTabs(): array
    {
        return [
            null => Tab::make('All'),
            'Surat Masuk' => Tab::make()->query(fn ($query) => $query->where('mail_type', 'incoming')),
            'Surat keluar' => Tab::make()->query(fn ($query) => $query->where('mail_type', 'outgoing')),
        ];
    }
}
