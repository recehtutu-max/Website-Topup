<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopupController extends Controller
{
    private function getGamesData()
    {
        return [
            'free-fire' => [
                'name'     => 'Free Fire Diamonds',
                'image'    => '/images/card_ff.png',
                'hero_bg'  => 'linear-gradient(135deg, #7b1a1a 0%, #1a0a0a 100%)',
                'id_hint'  => 'Simpan ID dengan Run Save ID',
                'requires_server' => false,
                'packages' => [
                    ['name' => 'Free Fire 100 Diamond', 'price' => 15000],
                    ['name' => 'Free Fire 120 Diamond', 'price' => 15000],
                    ['name' => 'Free Fire 125 Diamond', 'price' => 15000],
                    ['name' => 'Free Fire 125 Diamond', 'price' => 15000],
                    ['name' => 'Free Fire 130 Diamond', 'price' => 15000],
                    ['name' => 'Free Fire 140 Diamond', 'price' => 20000],
                    ['name' => 'Free Fire 130 Diamond', 'price' => 20000],
                    ['name' => 'Free Fire 140 Diamond', 'price' => 20000],
                    ['name' => 'Free Fire 140 Diamond', 'price' => 20000],
                    ['name' => 'Free Fire 145 Diamond', 'price' => 20000],
                    ['name' => 'Free Fire 145 Diamond', 'price' => 20000],
                    ['name' => 'Free Fire 150 Diamond', 'price' => 30000],
                    ['name' => 'Free Fire 150 Diamond', 'price' => 30000],
                    ['name' => 'Free Fire 160 Diamond', 'price' => 30000],
                    ['name' => 'Free Fire 160 Diamond', 'price' => 30000],
                    ['name' => 'Free Fire 170 Diamond', 'price' => 30000],
                    ['name' => 'Free Fire 355 Diamond', 'price' => 50000],
                ],
            ],
            'mobile-legends' => [
                'name'     => 'Mobile Legends Diamonds',
                'image'    => '/images/card_mlbb.png',
                'hero_bg'  => 'linear-gradient(135deg, #1a1265 0%, #0b0c10 100%)',
                'id_hint'  => 'Simpan ID dengan Run Save ID',
                'requires_server' => true,
                'packages' => [
                    ['name' => '58 Diamond',                  'price' => 15000],
                    ['name' => '64 Diamond',                  'price' => 15000],
                    ['name' => '58 Diamond',                  'price' => 20000],
                    ['name' => '60 Diamond',                  'price' => 30000],
                    ['name' => '65 Diamond',                  'price' => 20000],
                    ['name' => '71 Diamond',                  'price' => 30000],
                    ['name' => '74 Diamond',                  'price' => 30000],
                    ['name' => '78 Diamond',                  'price' => 30000],
                    ['name' => '80 Diamond',                  'price' => 30000],
                    ['name' => 'MOBILE LEGENDS Weekly Diamond Pass', 'price' => 30000],
                    ['name' => '75 Diamond',                  'price' => 25000],
                    ['name' => '85 Diamond',                  'price' => 25000],
                    ['name' => '86 Diamond',                  'price' => 25000],
                    ['name' => '88 Diamond',                  'price' => 25000],
                    ['name' => '89 Diamond',                  'price' => 35000],
                    ['name' => '90 Diamond',                  'price' => 25000],
                    ['name' => '110 Diamond',                 'price' => 30000],
                    ['name' => '706 Diamond',                 'price' => 100000],
                    ['name' => '870 Diamond',                 'price' => 200000],
                    ['name' => '845 Diamond',                 'price' => 200000],
                    ['name' => '888 Diamond',                 'price' => 300000],
                ],
            ],
            'pubg' => [
                'name'     => 'PUBG Mobile UC',
                'image'    => '/images/hero_pubg.png',
                'hero_bg'  => 'linear-gradient(135deg, #3d2b00 0%, #0b0c10 100%)',
                'id_hint'  => 'Simpan ID dengan Run Save ID',
                'requires_server' => false,
                'packages' => [
                    ['name' => 'PUBG MOBILE 70 UC',    'price' => 20000],
                    ['name' => 'PUBG MOBILE 70 UC',    'price' => 25000],
                    ['name' => 'PUBG MOBILE 105 UC',   'price' => 30000],
                    ['name' => 'PUBG MOBILE 120 UC',   'price' => 30000],
                    ['name' => 'PUBG MOBILE 120 UC',   'price' => 30000],
                    ['name' => 'PUBG MOBILE 82 UC',    'price' => 30000],
                    ['name' => 'PUBG MOBILE 62 UC',    'price' => 30000],
                    ['name' => 'PUBG MOBILE 73 UC',    'price' => 30000],
                    ['name' => 'PUBG MOBILE 73 UC',    'price' => 30000],
                    ['name' => 'PUBG MOBILE 122 UC',   'price' => 40000],
                    ['name' => 'PUBG MOBILE 125 UC',   'price' => 40000],
                    ['name' => 'PUBG MOBILE 131 UC',   'price' => 40000],
                    ['name' => 'PUBG MOBILE 122 UC',   'price' => 50000],
                    ['name' => 'PUBG MOBILE 125 UC',   'price' => 50000],
                    ['name' => 'Pubg Royale Pass',      'price' => 100000],
                ],
            ],
        ];
    }

    public function show($slug)
    {
        $games = $this->getGamesData();

        if (!isset($games[$slug])) {
            abort(404);
        }

        $game = $games[$slug];

        return view('topup', compact('game'));
    }
}
