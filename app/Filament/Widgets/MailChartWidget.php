<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Mail;
use Carbon\Carbon;

class MailChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Grafik Jumlah Surat per Periode';
    protected static ?int $sort = 2;

    public ?string $filter = 'monthly'; // Default pilihan

    public function getColumnSpan(): int|string|array
    {
        return 'full';
    }

    protected function getFilters(): ?array
    {
        return [
            'weekly' => 'Mingguan',
            'monthly' => 'Bulanan',
            'yearly' => 'Tahunan',
        ];
    }

    protected function getOptions(): array
    {
        [$labels, $values] = match ($this->filter) {
            'weekly' => $this->getWeeklyData(),
            'yearly' => $this->getYearlyData(),
            default => $this->getMonthlyData(),
        };

        return [
            'chart' => [
                'type' => 'bar',
                'toolbar' => ['show' => true],
            ],
            'xaxis' => [
                'categories' => $labels,
            ],
            'series' => [
                [
                    'name' => 'Jumlah Surat',
                    'data' => $values,
                ],
            ],
        ];
    }

    private function getMonthlyData(): array
    {
        $labels = [];
        $values = [];

        $data = Mail::selectRaw('MONTH(mail_date) as month, COUNT(*) as count')
            ->whereYear('mail_date', now()->year)
            ->groupBy('month')
            ->pluck('count', 'month');

        foreach (range(1, 12) as $month) {
            $labels[] = Carbon::create()->month($month)->translatedFormat('F'); // Januari, Februari, dst.
            $values[] = $data[$month] ?? 0;
        }

        return [$labels, $values];
    }

    private function getWeeklyData(): array
    {
        $labels = [];
        $values = [];

        $data = Mail::selectRaw('WEEK(mail_date, 1) as week, COUNT(*) as count')
            ->whereYear('mail_date', now()->year)
            ->groupBy('week')
            ->pluck('count', 'week');

        foreach (range(1, 52) as $week) {
            $labels[] = "Minggu $week";
            $values[] = $data[$week] ?? 0;
        }

        return [$labels, $values];
    }

    private function getYearlyData(): array
    {
        $labels = [];
        $values = [];

        $data = Mail::selectRaw('YEAR(mail_date) as year, COUNT(*) as count')
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('count', 'year');

        foreach ($data as $year => $count) {
            $labels[] = $year;
            $values[] = $count;
        }

        return [$labels, $values];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
