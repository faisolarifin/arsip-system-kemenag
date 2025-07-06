<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\CreateAction;

class CreateMail extends CreateRecord
{
    protected static string $resource = MailResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl();
    }
}
