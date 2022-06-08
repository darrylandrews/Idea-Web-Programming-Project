<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            ['type' => 'Bed Frame', 'image' => 'types\bed.jpg'],
            ['type' => 'Chair', 'image' => 'types\chair.jpg'],
            ['type' => 'Desk Lamp', 'image' => 'types\desklamp.jpg'],
            ['type' => 'Drawer', 'image' => 'types\drawer.jpg'],
            ['type' => 'Table', 'image' => 'types\table.jpg']
        ]);
    }
}
