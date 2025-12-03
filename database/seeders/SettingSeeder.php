<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create(['key' => 'contact_address', 'value' => 'مجتمع المصممين، <br />الرياض، المملكة العربية السعودية']);
        Setting::create(['key' => 'contact_email', 'value' => 'info@example.com']);
        Setting::create(['key' => 'contact_phone', 'value' => '1-232-3434 (Main)']);
    }
}