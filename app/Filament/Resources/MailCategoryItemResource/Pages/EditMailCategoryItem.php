<?php

namespace App\Filament\Resources\MailCategoryItemResource\Pages;

use App\Filament\Resources\MailCategoryItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMailCategoryItem extends EditRecord
{
    protected static string $resource = MailCategoryItemResource::class;

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
