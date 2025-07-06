<?php

namespace App\Filament\Resources\MailCategoryResource\Pages;

use App\Filament\Resources\MailCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMailCategories extends ListRecords
{
    protected static string $resource = MailCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
