<?php

namespace Tests\Feature;

use App\Models\Perizinan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Response;

class PerizinanTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_data_perizinan()
    {
        $response = $this->get('/api/perizinan')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' =>  [
                        '*' => [
                            "id",
                            "no_identitas",
                            "tanggal_permohonan",
                            "tanggal_perizinan",
                            "keterangan",
                            "status",
                            "gambar",
                            "lat",
                            "lng"
                        ],
                    ],
                ],
            );
    }

    public function test_for_add_perizinan()
    {

        $userData = [
            "id" => "",
            "no_identitas" => 123123,
            "tanggal_permohonan" => "2023-04-12",
            "tanggal_perizinan" => "2023-04-14",
            "keterangan" => "Sakit Berat",
            "status" => 1,
            "gambar" => "D:\siakad\storage\app\public\16797264490.png",
            "lat" => -7.914623,
            "lng" => 112.605135
        ];

        $this->json('POST', 'api/perizinan', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "no_identitas",
                    "tanggal_permohonan",
                    "tanggal_perizinan",
                    "keterangan",
                    "status",
                    "gambar",
                    "lat",
                    "lng"
                ],
            ]);
    }

    public function testPerizinanUpdated()
    {
        $perizinan = Perizinan::create([
            "id" => 1,
            "no_identitas" => 123123,
            "tanggal_permohonan" => "2023-04-12",
            "tanggal_perizinan" => "2023-04-14",
            "keterangan" => "Sakit Berat",
            "status" => 1,
            "gambar" => "D:\siakad\storage\app\public\16797264490.png",
            "lat" => -7.914623,
            "lng" => 112.605135
        ]);

        $payload = [
            "id" => 1,
            "no_identitas" => 123123,
            "tanggal_permohonan" => "2023-04-12",
            "tanggal_perizinan" => "2023-04-14",
            "keterangan" => "Sakit Berat",
            "status" => 1,
            "gambar" => "D:\siakad\storage\app\public\16797264490.png",
            "lat" => -7.914623,
            "lng" => 112.605135
        ];

        $this->json('PATCH', 'api/perizinan/' . $perizinan->id, $payload, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    public function test_for_delete_perizinan()
    {
        $perizinan = Perizinan::create([
            "id" => 1,
            "no_identitas" => 123123,
            "tanggal_permohonan" => "2023-04-12",
            "tanggal_perizinan" => "2023-04-14",
            "keterangan" => "Sakit Berat",
            "status" => 1,
            "gambar" => "D:\siakad\storage\app\public\16797264490.png",
            "lat" => -7.914623,
            "lng" => 112.605135
        ]);

        $this->json('DELETE', 'api/perizinan/' . $perizinan->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
