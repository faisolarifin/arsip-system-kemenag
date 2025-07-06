<?php

namespace App\Filament\Resources\MailCategoryResource\Pages;

use App\Filament\Resources\MailCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMailCategory extends EditRecord
{
    protected static string $resource = MailCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl();
    }
}
