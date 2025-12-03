<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SocialLink;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialLink::create([
            'name' => 'Facebook',
            'url' => 'https://facebook.com',
            'icon' => 'theme/assets/img/icons/f.png',
        ]);

        SocialLink::create([
            'name' => 'Twitter',
            'url' => 'https://twitter.com',
            'icon' => 'theme/assets/img/icons/t.png',
        ]);

        SocialLink::create([
            'name' => 'Instagram',
            'url' => 'https://instagram.com',
            'icon' => 'theme/assets/img/icons/i.png',
        ]);
    }
}