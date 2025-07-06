<?php

namespace App\Filament\Auth;

use Filament\Pages\Auth\Login;
use Illuminate\Contracts\Support\Htmlable;

class AdminLogin extends Login
{
    public function getHeading(): string|Htmlable
    {
        return 'TAKASUKMA';
    }

    public function getSubheading(): string|Htmlable
    {
        return 'Tata Kelola Arsip Surat Kementerian Agama';
    }
}