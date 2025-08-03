<?php

namespace App\Filament\Auth;

use Filament\Pages\Auth\Login;
use Illuminate\Contracts\Support\Htmlable;

class AdminLogin extends Login
{
    public function getHeading(): string|Htmlable
    {
        return 'ARSIP PENDIS';
    }

    public function getSubheading(): string|Htmlable
    {
        return 'Sistem Informasi Arsip Surat Pendis Kementerian Agama';
    }
}