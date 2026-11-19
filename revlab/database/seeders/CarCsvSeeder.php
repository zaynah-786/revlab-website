<?php

namespace Database\Seeders;

use App\Models\CarModel;
use App\Models\Company;
use Illuminate\Database\Seeder;

class CarCsvSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/cars.csv');
        $file = fopen($path, 'r');

        $headers = fgetcsv($file);

        while (($row = fgetcsv($file)) !== false) {
            if (count($row) !== count($headers)) {
                continue;
            }

            $data = array_combine($headers, $row);

            $company = Company::firstOrCreate([
                'name' => trim($data['company']),
            ]);

            CarModel::updateOrCreate(
                [
                    'company_id' => $company->id,
                    'name' => trim($data['name']),
                ],
                [
                    'year' => (int) $data['year'],
                    'country' => trim($data['country']),
                    'production_numbers' => trim($data['production_numbers']),
                    'horsepower' => (int) $data['horsepower'],
                    'torque_nm' => (int) $data['torque_nm'],
                    'zero_to_hundred_s' => (float) $data['zero_to_hundred_s'],
                    'top_speed_kmh' => (int) $data['top_speed_kmh'],
                    'engine' => trim($data['engine']),
                    'transmission' => trim($data['transmission']),
                    'drivetrain' => trim($data['drivetrain']),
                    'weight_kg' => (int) $data['weight_kg'],
                    'chassis' => trim($data['chassis']),
                    'aero_highlight' => trim($data['aero_highlight']),
                    'description' => trim($data['description']),
                    'sketchfab_url' => trim($data['sketchfab_url']),
                ]
            );
        }

        fclose($file);
    }
}