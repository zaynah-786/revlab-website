<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                // Manufacturers & Coachbuilders
                'Pagani',
                'Bugatti',
                'Hennessey',
                'Zenvo',
                'Apollo Automobil',
                'Aston Martin',
                'Ferrari',
                'McLaren',
                'Porsche',
                'Mercedes-AMG',
                'Lotus',
                'Aspark',
                'De Tomaso',
                'Maserati',
                'Lamborghini',
                'Hypercar',
                'Megacar',
                'W16',
                'Hybrid Hypercar',
                'KERS',
                'Torque Vectoring',
                'Quad-Turbo',
                'Flat-Plane Crank',
                'Naturally Aspirated',
                'Dry Sump',
                'Sequential Gearbox',
                'Dual-Clutch Transmission (DCT)',
                'Redline',
                'Power-to-Weight Ratio',
                'Axial-Flux Motor',
                '800-Volt Architecture',
                'Rimac Nevera',
                'Supercapacitor',
                'Inconel Exhaust',
                'Titanium Exhaust',
                'Anti-Lag System',
                'Launch Control',
                'MGU-H',
                'Bespoke V12',
                'E-Fuel',
                'Active Aerodynamics',
                'Ground Effect',
                'Venturi Tunnels',
                'DRS (Drag Reduction System)',
                'Swan-Neck Wing',
                'Front Splitter',
                'Rear Diffuser',
                'Dive Planes / Canards',
                'NACA Duct',
                'Roof Scoop',
                'Vortex Generators',
                'Gurney Flap',
                'Wheel Arch Louvers',
                'Coefficient of Drag (Cd)',
                'Downforce-to-Drag Ratio',
                'Fan-Assisted Aero',
                'Active Ride Height',
                'Air Brake',
                'Teardrop Cabin',
                'S-Duct',
                'Carbon Fiber Monocoque',
                'Carbo-Titanium',
                'Forged Composite',
                'Pushrod Suspension',
                'Carbon-Ceramic Brakes (CCM)',
                'Center-Lock Wheels',
                'Magnesium Wheels',
                'Telemetry',
                '3D-Printed Titanium',
                'Torsional Rigidity',
                'Hydraulic Cross-Linked Suspension',
            ]),
        ];
    }
}