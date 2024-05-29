<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('web_configs')->insert([
            ['key' => 'web_title', 'value' => 'SMKN TUGUMULYO'],
            ['key' => 'web_url', 'value' => 'ppdb.smkn-tgm.sch.id'],
            ['key' => 'web_keyword', 'value' => 'PENERIMAAN PESERTA DIDIK BARU SMKN TUGUMULYO'],
            ['key' => 'web_description', 'value' => 'PENERIMAAN PESERTA DIDIK BARU SMKN TUGUMULYO'],
        ]);
    }
}
