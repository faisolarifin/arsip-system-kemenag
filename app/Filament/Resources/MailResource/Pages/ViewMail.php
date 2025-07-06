<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use App\Models\Mail;
use Filament\Actions;
use Filament\Resources\Pages\page;

class ViewMail extends page
{
    protected static string $resource = MailResource::class;

    protected static string $view = 'vendor.filament.resources.mail-resource.pages.view-mail';

    public Mail $record;
}
