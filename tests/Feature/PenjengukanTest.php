<?php

namespace Tests\Feature;

use App\Models\Penjengukan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Response;

class PenjengukanTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_data_penjengukan()
    {
        $response = $this->get('/api/penjengukan')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' =>  [
                        '*' => [
                            "id",
                            "nama_santri",
                            "tanggal_penjengukan",
                            "keterangan"
                        ],
                    ],
                ],
            );
    }

    public function test_for_add_penjengukan()
    {

        $userData = [
            "id" => "",
            "nama_santri" => "Udin",
            "tanggal_penjengukan" => "2023-04-12",
            "keterangan" => "Izin Menjenguk"
        ];

        $this->json('POST', 'api/penjengukan', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "nama_santri",
                    "tanggal_penjengukan",
                    "keterangan"
                ],
            ]);
    }

    public function testPenjengukanUpdated()
    {
        $penjengukan = Penjengukan::create([
            "id" => 1,
            "nama_santri" => "Udin",
            "tanggal_penjengukan" => "2023-04-12",
            "keterangan" => "Izin Menjenguk"
        ]);

        $payload = [
            "id" => 1,
            "nama_santri" => "Udin",
            "tanggal_penjengukan" => "2023-04-12",
            "keterangan" => "Izin Menjenguk"
        ];

        $this->json('PATCH', 'api/penjengukan/' . $penjengukan->id, $payload, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    public function test_for_delete_absen()
    {
        $penjengukan = Penjengukan::create([
            "id" => 1,
            "nama_santri" => "Udin",
            "tanggal_penjengukan" => "2023-04-12",
            "keterangan" => "Izin Menjenguk"
        ]);

        $this->json('DELETE', 'api/penjengukan/' . $penjengukan->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
