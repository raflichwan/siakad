<?php

namespace Tests\Feature;

use App\Models\Absen;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Http\Response;

class AbsenTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_data_absen()
    {
        $response = $this->get('/api/absen')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' =>  [
                        '*' => [
                            "id",
                            "no_identitas",
                            "tanggal",
                            "keterangan",
                            "jenis"
                        ],
                    ],
                ],
            );
    }

    public function test_for_add_absen()
    {

        $userData = [
            "id" => "",
            "no_identitas" => 123123,
            "tanggal" => 2023 - 04 - 12,
            "keterangan" => "Sakit Berat",
            "jenis" => "S"
        ];

        $this->json('POST', 'api/absen', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "no_identitas",
                    "tanggal",
                    "keterangan",
                    "jenis"
                ],
            ]);
    }

    public function testAbsenUpdated()
    {
        $absen = Absen::create([
            "id" => 1,
            "no_identitas" => 123123,
            "tanggal" => "2023-04-12",
            "keterangan" => "Sakit Berat",
            "jenis" => "S"
        ]);

        $payload = [
            "id" => 1,
            "no_identitas" => 123123,
            "tanggal" => "2023-04-12",
            "keterangan" => "Sakit Berat",
            "jenis" => "S"
        ];

        $this->json('PATCH', 'api/absen/' . $absen->id, $payload, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    public function test_for_delete_absen()
    {
        $absen = Absen::create([
            "id" => 1,
            "no_identitas" => 123123,
            "tanggal" => "2023-04-12",
            "keterangan" => "Sakit Berat",
            "jenis" => "S"
        ]);

        $this->json('DELETE', 'api/absen/' . $absen->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
