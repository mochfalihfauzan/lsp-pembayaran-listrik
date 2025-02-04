<?php

namespace Tests\Feature;

use App\Models\Pelanggan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PelangganControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test store method.
     *
     * @return void
     */
    public function testStore()
    {
        // Data input untuk pengujian
        $data = [
            'username' => $this->faker->unique()->userName,
            'nomor_kwh' => $this->faker->numerify('##########'),
            'alamat' => $this->faker->address,
            'nama_pelanggan' => $this->faker->name,
            'id_tarif' => 1, // Pastikan id_tarif ini ada di database
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password123',
        ];

        // Lakukan permintaan POST ke rute store
        $response = $this->post(route('register-user'), $data);

        // Periksa apakah respons berhasil
        $response->assertStatus(302); // Redirect status
        $response->assertRedirect(route('dashboard-user'));

        // Periksa apakah data tersimpan di database
        $this->assertDatabaseHas('pelanggans', [
            'username' => $data['username'],
            'nomor_kwh' => $data['nomor_kwh'],
            'alamat' => $data['alamat'],
            'nama_pelanggan' => $data['nama_pelanggan'],
            'id_tarif' => $data['id_tarif'],
            'email' => $data['email'],
        ]);
    }
}
