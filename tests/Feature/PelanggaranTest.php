<?php

namespace Tests\Feature;

use App\Models\Pelanggaran;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Response;

class PelanggaranTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_data_pelanggaran()
    {
        $response = $this->get('/api/pelanggaran')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' =>  [
                        '*' => [
                            "id",
                            "pelanggaran_master_id",
                            "no_identitas",
                            "tanggal"
                        ],
                    ],
                ],
            );
    }

    public function test_for_add_absen()
    {

        $userData = [
            "id" => "",
            "pelanggaran_master_id" => 1,
            "no_identitas" => 111,
            "tanggal" => "2023-04-12"
        ];

        $this->json('POST', 'api/pelanggaran', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "pelanggaran_master_id",
                    "no_identitas",
                    "tanggal"
                ],
            ]);
    }

    public function testPelanggaranUpdated()
    {
        $pelanggaran = Pelanggaran::create([
            "id" => 1,
            "pelanggaran_master_id" => 1,
            "no_identitas" => 111,
            "tanggal" => "2023-04-12"
        ]);

        $payload = [
            "id" => 1,
            "pelanggaran_master_id" => 1,
            "no_identitas" => 111,
            "tanggal" => "2023-04-12"
        ];

        $this->json('PATCH', 'api/pelanggaran/' . $pelanggaran->id, $payload, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    public function test_for_delete_pelanggaran()
    {
        $pelanggaran = Pelanggaran::create([
            "id" => 1,
            "pelanggaran_master_id" => 1,
            "no_identitas" => 111,
            "tanggal" => "2023-04-12"
        ]);

        $this->json('DELETE', 'api/pelanggaran/' . $pelanggaran->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
