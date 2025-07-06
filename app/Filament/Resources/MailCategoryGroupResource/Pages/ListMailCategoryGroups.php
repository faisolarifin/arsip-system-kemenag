<?php

namespace App\Filament\Resources\MailCategoryGroupResource\Pages;

use App\Filament\Resources\MailCategoryGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMailCategoryGroups extends ListRecords
{
    protected static string $resource = MailCategoryGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
