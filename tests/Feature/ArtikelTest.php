<?php

namespace Tests\Feature;

use App\Models\Artikel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Http\Response;

class ArtikelTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_data_artikel()
    {
        $response = $this->get('/api/artikel')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' =>  [
                        '*' => [
                            "id",
                            "judul",
                            "description",
                            "url"
                        ],
                    ],
                ],
            );
    }

    public function test_for_add_artikel()
    {

        $userData = [
            "id" => "",
            "judul" => "Ini Adalah Judul22",
            "description" => "Ini adalah Deskripsi12",
            "url" => "D:\siakad\storage\app\public\16797264490.png"
        ];

        $this->json('POST', 'api/artikel', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "judul",
                    "description",
                    "url"
                ],
            ]);
    }

    public function test_for_update_artikel()
    {
        $artikel = Artikel::create([
            "id" => 1,
            "judul" => "Ini adalah judul",
            "description" => "<p>Ini adalah isi artikel</p>",
            "url" => "artikelcover/RoBKbfUiwTMFH7sQ6349Yx5E1p6WQfmg1qmVpevX.jpg"
        ]);

        $payload = [
            "id" => 1,
            "judul" => "Ini adalah judulnyaa",
            "description" => "<p>Ini adalah isi artikel</p>",
            "url" => "artikelcover/RoBKbfUiwTMFH7sQ6349Yx5E1p6WQfmg1qmVpevX.jpg"
        ];


        $this->json('PATCH', 'api/artikel/' . $artikel->id, $payload, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    public function test_for_delete_artikel()
    {
        $artikel = Artikel::create([
            "id" => 1,
            "judul" => "Ini adalah judul",
            "description" => "<p>Ini adalah isi artikel</p>",
            "url" => "artikelcover/RoBKbfUiwTMFH7sQ6349Yx5E1p6WQfmg1qmVpevX.jpg"
        ]);

        $this->json('DELETE', 'api/artikel/' . $artikel->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
