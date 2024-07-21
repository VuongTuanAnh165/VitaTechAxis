<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('businesses')->insert([
            [
                'name' => 'VitaTech Axis',
                'registration_number' => Str::random(10),
                'tax_id' => Str::random(10),
                'address' => '123 Main St',
                'city' => 'Hanoi',
                'state' => 'HN',
                'country' => 'Vietnam',
                'postal_code' => '100000',
                'phone' => '0123456789',
                'fax' => '0123456789',
                'email' => 'contact@abccorp.com',
                'website' => 'http://abccorp.com',
                'established_date' => '2000-01-01',
                'industry' => 'Manufacturing',
                'number_of_employees' => 500,
                'annual_revenue' => 1000000.00,
                'logo' => 'http://abccorp.com/logo.png',
                'contact_person' => 'Vương Tuấn Anh',
                'contact_position' => 'CEO',
                'contact_phone' => '0123456789',
                'contact_email' => 'vuongtuananh165@gmail.com',
                'description' => 'Leading manufacturer of electronics',
                'notes' => 'Top 100 companies in Asia',
                'business_type' => 'Corporation',
                'registration_authority' => 'Department of Planning and Investment',
                'registration_date' => '2000-01-01',
                'capital' => '1,000,000 USD',
                'branches' => 'Hanoi, Ho Chi Minh City',
                'services_offered' => 'Manufacturing, Export',
                'certifications' => 'ISO 9001, ISO 14001',
                'awards' => 'Best Manufacturer 2020',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
