<?php

namespace Tests\Feature;

use App\Models\Web;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Response;

class WebTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_data_web()
    {
        $response = $this->get('/api/web')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' =>  [
                        '*' => [
                            "id",
                            "name",
                            "description",
                            "path"
                        ],
                    ],
                ],
            );
    }

    public function test_for_add_web()
    {

        $userData = [
            "id" => "",
            "name" => "tagjudul",
            "description" => "Ini Adalah Judul",
            "path" => "artikelcover/RoBKbfUiwTMFH7sQ6349Yx5E1p6WQfmg1qmVpevX.jpg",
        ];

        $this->json('POST', 'api/web', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "name",
                    "description",
                    "path"
                ],
            ]);
    }

    public function testWebUpdated()
    {
        $web = Web::create([
            "id" => 1,
            "name" => "tagjudul",
            "description" => "Ini Adalah Judul",
            "path" => "artikelcover/RoBKbfUiwTMFH7sQ6349Yx5E1p6WQfmg1qmVpevX.jpg",
        ]);

        $payload = [
            "id" => 1,
            "name" => "tagjudul",
            "description" => "Ini Adalah Judul",
            "path" => "artikelcover/RoBKbfUiwTMFH7sQ6349Yx5E1p6WQfmg1qmVpevX.jpg",
        ];

        $this->json('PATCH', 'api/web/' . $web->id, $payload, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    public function test_for_delete_web()
    {
        $web = Web::create([
            "id" => 1,
            "name" => "tagjudul",
            "description" => "Ini Adalah Judul",
            "path" => "artikelcover/RoBKbfUiwTMFH7sQ6349Yx5E1p6WQfmg1qmVpevX.jpg",
        ]);

        $this->json('DELETE', 'api/web/' . $web->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
