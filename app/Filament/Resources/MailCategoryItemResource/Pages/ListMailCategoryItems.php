<?php

namespace App\Filament\Resources\MailCategoryItemResource\Pages;

use App\Filament\Resources\MailCategoryItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMailCategoryItems extends ListRecords
{
    protected static string $resource = MailCategoryItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
