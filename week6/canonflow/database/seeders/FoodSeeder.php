<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('foods')->insert([
        //     [
        //         'name' => 'Nasi Merah dengan Ayam Panggang Kecap dan Tumis Kangkung',
        //         'nutritional_fact' => 'Kalori: 400-550 kkal
        //                     Protein: 30-40 gram
        //                     Lemak: 15-25 gram
        //                     Karbohidrat: 50-70 gram
        //                     Serat: 5-8 gram',
        //         'description' => 'Nikmati hidangan sehat dan lezat dengan Nasi Merah yang kaya serat, dipadukan dengan Ayam Panggang',
        //         'price' => 35000,
        //         'category_id' => 2,
        //     ],
        //     [
        //         'name' => 'Nasi Hitam dan Tumis Ca Kailan',
        //         'nutritional_fact' => 'Kalori: 400-550 kkal
        //                     Protein: 30-40 gram
        //                     Lemak: 15-25 gram
        //                     Karbohidrat: 50-70 gram
        //                     Serat: 5-8 gram',
        //         'description' => 'Nikmati hidangan sehat dan lezat dengan Nasi Hitam yang kaya serat',
        //         'price' => 30000,
        //         'category_id' => 2,
        //     ],
        // ]);

        for ($i = 0; $i < 100; $i++) {
            DB::table("foods")
                ->insert([
                    "name" => fake()->words(3, true),
                    "nutritional_fact" => fake()->sentences(2, true),
                    "description" => fake()->paragraph(4),
                    "price" => fake()->numberBetween(1, 200) * 500,
                    "category_id" => fake()->numberBetween(1, 6)
                ]);
        }
    }
}
