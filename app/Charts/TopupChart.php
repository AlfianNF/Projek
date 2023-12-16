<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class TopupChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $jenis_game = \App\Models\TopupNominals::selectRaw('game_id, COUNT(id) as game_count')
            ->groupBy('game_id')
            ->get();

        $data = [
            $jenis_game->where('game_id', 1)->pluck('game_count')->first(),
            $jenis_game->where('game_id', 2)->pluck('game_count')->first(),
            $jenis_game->where('game_id', 3)->pluck('game_count')->first(),
            $jenis_game->where('game_id', 4)->pluck('game_count')->first(),
        ];

        $label = [
            'Genshin Impact',
            'Honkai Star Rail',
            'Mobile Legends',
            'Clash Of Clans'
        ];

        return $this->chart->pieChart()
            ->setTitle('Data Nominal Topup Game')
            ->setSubtitle('berdasarkan jenis gamenya')
            ->setWidth(500)
            ->setHeight(500)
            ->addData($data)
            ->setLabels($label);
    }

}
