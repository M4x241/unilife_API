<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WhatsAppGroup;

class WhatsAppGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WhatsAppGroup::create(['group_name' => 'COM600', 'link' => 'https://chat.whatsapp.com/BS7pmhiePpz2mjIzUnOxFy?mode=hqrc']);
        WhatsAppGroup::create(['group_name' => 'SIS421', 'link' => 'https://chat.whatsapp.com/BS7pmhiePpz2mjIzUnOxFy?mode=hqrc']);
        WhatsAppGroup::create(['group_name' => 'COM350', 'link' => 'https://chat.whatsapp.com/BS7pmhiePpz2mjIzUnOxFy?mode=hqrc']);
        WhatsAppGroup::create(['group_name' => 'SIS258', 'link' => 'https://chat.whatsapp.com/BS7pmhiePpz2mjIzUnOxFy?mode=hqrc']);
        WhatsAppGroup::create(['group_name' => 'SIS427', 'link' => 'https://chat.whatsapp.com/BS7pmhiePpz2mjIzUnOxFy?mode=hqrc']);
        WhatsAppGroup::create(['group_name' => 'SIS104', 'link' => 'https://chat.whatsapp.com/BS7pmhiePpz2mjIzUnOxFy?mode=hqrc']);
    }
}
