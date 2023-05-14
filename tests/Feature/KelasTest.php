<?php

namespace Tests\Feature;

use App\Models\KelasMaster;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Response;

class KelasTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_data_kelas()
    {
        $response = $this->get('/api/kelas')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' =>  [
                        '*' => [
                            "id",
                            "keterangan"
                        ],
                    ],
                ],
            );
    }

    public function test_for_add_kelas()
    {

        $userData = [
            "id" => 2,
            "keterangan" => "10 IPS"
        ];

        $this->json('POST', 'api/kelas', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "keterangan"
                ],
            ]);
    }

    public function testKelasUpdated()
    {
        $kelas = KelasMaster::create([
            "id" => 1,
            "keterangan" => "10 IPS"
        ]);

        $payload = [
            "id" => 1,
            "keterangan" => "10 IPS"
        ];

        $this->json('PATCH', 'api/kelas/' . $kelas->id, $payload, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    public function test_for_delete_kelas()
    {
        $kelas = KelasMaster::create([
            "id" => 1,
            "keterangan" => "10 IPS"
        ]);

        $this->json('DELETE', 'api/kelas/' . $kelas->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
