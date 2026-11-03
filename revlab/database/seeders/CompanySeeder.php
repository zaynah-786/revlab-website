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
        $a = Company::create(['name' => 'Koenigsegg']);
        $a->carModels()->createMany([
            ['name' => 'Jesko'],
            ['name' => 'Agera RS'],
            ['name' => 'Regera'],
        ]);

        $a = Company::create(['name' => 'Pagani']);
        $a->carModels()->createMany([
            ['name' => 'Zonda'],
            ['name' => 'Huayra'],
            ['name' => 'Utopia'],
        ]);
    }
}
