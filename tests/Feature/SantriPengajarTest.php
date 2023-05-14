<?php

namespace Tests\Feature;

use App\Models\Santri;
use App\Models\Santripengajar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Response;

class SantriPengajarTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_data_santripengajar()
    {
        $response = $this->get('/api/santripengajar')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' =>  [
                        '*' => [
                            "no_identitas",
                            "nama",
                            "alamat",
                            "jenis_kelamin",
                            "tanggal_lahir",
                            "kelas",
                            "no_hp",
                            "type"
                        ],
                    ],
                ],
            );
    }

    public function test_for_add_santri_pengajar()
    {

        $userData = [
            "no_identitas" => 123,
            "nama" => "Udin",
            "alamat" => "Malang",
            "jenis_kelamin" => "L",
            "tanggal_lahir" => "2023-04-12",
            "kelas" => 1,
            "no_hp" => 812312,
            "type" => "S"
        ];

        $this->json('POST', 'api/santripengajar', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "no_identitas",
                    "nama",
                    "alamat",
                    "jenis_kelamin",
                    "tanggal_lahir",
                    "kelas",
                    "no_hp",
                    "type"
                ],
            ]);
    }

    public function testSantriPengajarUpdated()
    {
        $santripengajar = Santripengajar::create([
            "no_identitas" => 123,
            "nama" => "Udin",
            "alamat" => "Malang",
            "jenis_kelamin" => "L",
            "tanggal_lahir" => "2023-04-12",
            "kelas" => 1,
            "no_hp" => 812312,
            "type" => "S"
        ]);

        $payload = [
            "no_identitas" => 123,
            "nama" => "Udin",
            "alamat" => "Malang",
            "jenis_kelamin" => "L",
            "tanggal_lahir" => "2023-04-12",
            "kelas" => 1,
            "no_hp" => 812312,
            "type" => "S"
        ];

        $this->json('PATCH', 'api/santripengajar/' . $santripengajar->no_identitas, $payload, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    public function test_for_delete_santri_pengajar()
    {
        $santripengajar = Santripengajar::create([
            "no_identitas" => 123123,
            "nama" => "Udin",
            "alamat" => "Malang",
            "jenis_kelamin" => "L",
            "tanggal_lahir" => "2023-04-12",
            "kelas" => 1,
            "no_hp" => 812312,
            "type" => "S"
        ]);

        $this->json('DELETE', 'api/santripengajar/' . $santripengajar->no_identitas, [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
