<?php

namespace App\Filament\Resources\MailCategoryResource\Pages;

use App\Filament\Resources\MailCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMailCategory extends CreateRecord
{
    protected static string $resource = MailCategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl();
    }
}
