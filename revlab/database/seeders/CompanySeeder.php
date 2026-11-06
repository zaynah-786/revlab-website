<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $company = Company::create(['name' => 'Koenigsegg']);
        $company -> carModels()->createMany([
            ['name' => 'Jesko'],
            ['name' => 'Agera RS'],
            ['name' => 'Regera'],
        ]);

        $company2 = Company::create(['name' => 'Pagani']);
        $company2 -> carModels()->createMany([
            ['name' => 'Zonda'],
            ['name' => 'Huayra'],
            ['name' => 'Utopia'],
        ]);
    }
}
