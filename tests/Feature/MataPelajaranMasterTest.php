<?php

namespace Tests\Feature;

use App\Models\MataPelajaranMaster;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Response;

class MataPelajaranMasterTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_data_mapel()
    {
        $response = $this->get('/api/matapelajaranmaster')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' =>  [
                        '*' => [
                            "id",
                            "nama_mapel"
                        ],
                    ],
                ],
            );
    }

    public function test_for_add_mapel()
    {

        $userData = [
            "id" => "",
            "nama_mapel" => "Matematika"
        ];

        $this->json('POST', 'api/matapelajaranmaster', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "nama_mapel"
                ],
            ]);
    }

    public function testMataPelajaranMasterUpdated()
    {
        $mapel = MataPelajaranMaster::create([

            "id" => 1,
            "nama_mapel" => "Matematika"
        ]);

        $payload = [

            "id" => 1,
            "nama_mapel" => "Matematika"
        ];

        $this->json('PATCH', 'api/matapelajaranmaster/' . $mapel->id, $payload, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    public function test_for_delete_mapel()
    {
        $mapel = MataPelajaranMaster::create([

            "id" => 1,
            "nama_mapel" => "Matematika"
        ]);

        $this->json('DELETE', 'api/matapelajaranmaster/' . $mapel->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
