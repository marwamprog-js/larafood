<?php

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '23884656000120',
            'name' => 'EspecializaTi',
            'url' => 'especializati',
            'email' => 'marwam@gmail.com'
        ]);
    }
}
