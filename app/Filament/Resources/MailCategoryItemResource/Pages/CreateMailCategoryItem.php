<?php

namespace App\Filament\Resources\MailCategoryItemResource\Pages;

use App\Filament\Resources\MailCategoryItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMailCategoryItem extends CreateRecord
{
    protected static string $resource = MailCategoryItemResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl();
    }
}
