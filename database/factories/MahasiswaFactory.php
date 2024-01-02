<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'id' => 1,
            'nim' => $this->faker->bothify,
            'nama_mahasiswa' => $this->faker->word,
            'jurusan' => $this->faker->word,
            'asal_instansi' => $this->faker->word,
            'tanggal_masuk' => $this->faker->date,
            'tanggal_selesai' => $this->faker->date,
            'status' => 'Belum Selesai',

        ];
    }
}
