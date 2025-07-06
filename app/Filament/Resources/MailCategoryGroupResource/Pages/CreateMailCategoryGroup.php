<?php

namespace App\Filament\Resources\MailCategoryGroupResource\Pages;

use App\Filament\Resources\MailCategoryGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMailCategoryGroup extends CreateRecord
{
    protected static string $resource = MailCategoryGroupResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl();
    }
}
