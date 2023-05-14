<?php

namespace Tests\Feature;

use App\Models\PelanggaranMaster;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Response;

class PelanggaranMasterTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_data_pelanggaran_master()
    {
        $response = $this->get('/api/pelanggaranmaster')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' =>  [
                        '*' => [
                            "id",
                            "keterangan",
                            "poin",
                            "jenis_pelanggaran"
                        ],
                    ],
                ],
            );
    }

    public function test_for_add_pelanggaran_master()
    {

        $userData = [
            "id" => "",
            "keterangan" => "Terlambat",
            "poin" => 20,
            "jenis_pelanggaran" => "S"
        ];

        $this->json('POST', 'api/pelanggaranmaster', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "keterangan",
                    "poin",
                    "jenis_pelanggaran"
                ],
            ]);
    }

    public function testPelanggaranMasterUpdated()
    {
        $pelanggaranmaster = PelanggaranMaster::create([
            "id" => 1,
            "keterangan" => "Terlambat",
            "poin" => 20,
            "jenis_pelanggaran" => "S"
        ]);

        $payload = [
            "id" => 1,
            "keterangan" => "Terlambat",
            "poin" => 20,
            "jenis_pelanggaran" => "S"
        ];

        $this->json('PATCH', 'api/pelanggaranmaster/' . $pelanggaranmaster->id, $payload, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    public function test_for_delete_pelanggaran_master()
    {
        $pelanggaranmaster = PelanggaranMaster::create([
            "id" => 1,
            "keterangan" => "Terlambat",
            "poin" => 20,
            "jenis_pelanggaran" => "S"
        ]);

        $this->json('DELETE', 'api/pelanggaranmaster/' . $pelanggaranmaster->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
