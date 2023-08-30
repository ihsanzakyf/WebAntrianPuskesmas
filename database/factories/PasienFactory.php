<?php

namespace Database\Factories;

use Carbon\Carbon;
use Faker\Factory as faker;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = faker::create();
        return [

            'nama' => $faker->name(),
            'tanggal_lahir' => $faker->date(),
            'alamat' => $faker->address(),
            'nomor_telepon' => $faker->phoneNumber(),
            'tanggal_antri' => $faker->date(),
            'waktu_id' => Arr::random([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]),
            'id_poli' => Arr::random([1, 2, 3]),
            'id_pegawai' => Arr::random([1, 2, 3, 4, 5]),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
