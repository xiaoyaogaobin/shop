<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::firstOrNew([
                                          'username'=>'15163640385'])->fill(['password'=>bcrypt('admin888')])->save();
    }
}
