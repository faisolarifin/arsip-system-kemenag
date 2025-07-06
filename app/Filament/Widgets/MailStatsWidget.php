<?php

namespace App\Filament\Widgets;

use App\Models\Mail;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class MailStatsWidget extends BaseWidget
{
    protected ?string $heading = 'Statistik Arsip Surat';
    protected static ?int $sort = 1;

    protected function getCards(): array
    {
        return [
            Card::make('Total Arsip Surat', Mail::count())
                ->description('Jumlah semua surat')
                ->color('primary')
                ->icon('heroicon-o-archive-box'),

            Card::make('Surat Masuk', Mail::where('mail_type', 'incoming')->count())
                ->description('Total surat masuk')
                ->color('success')
                ->icon('heroicon-o-arrow-down-tray'),

            Card::make('Surat Keluar', Mail::where('mail_type', 'outgoing')->count())
                ->description('Total surat keluar')
                ->color('info')
                ->icon('heroicon-o-arrow-up-tray'),
        ];
    }
}
