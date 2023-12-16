<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class JenisKelaminChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $jenis_kelamin = \Illuminate\Foundation\Auth\User::selectRaw('jenis_kelamin, COUNT(id) as user_count')
            ->groupBy('jenis_kelamin')
            ->get();

        $data = [
            $jenis_kelamin->where('jenis_kelamin', 1)->pluck('user_count')->first(),
            $jenis_kelamin->where('jenis_kelamin', 0)->pluck('user_count')->first()
        ];

        $label = [
            'Laki-Laki',
            'Perempuan'
        ];

        return $this->chart->pieChart()
            ->setTitle('Data User')
            ->setSubtitle('berdasarkan jenis kelamin')
            ->setWidth(500)
            ->setHeight(500)
            ->addData($data)
            ->setLabels($label);
    }
}
