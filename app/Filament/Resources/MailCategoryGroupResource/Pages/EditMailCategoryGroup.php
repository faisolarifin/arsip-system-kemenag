<?php

namespace App\Filament\Resources\MailCategoryGroupResource\Pages;

use App\Filament\Resources\MailCategoryGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMailCategoryGroup extends EditRecord
{
    protected static string $resource = MailCategoryGroupResource::class;

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
