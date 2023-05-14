<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{

    public function index()
    {
        $Artikel = Artikel::get();
        return [
            "msg" => "tesd",
            "data" => $Artikel
        ];
    }

    public function show(Artikel $Artikel)
    {
        return [
            "data" => $Artikel
        ];
    }

    public function store(Request $request)
    {

        $vaUpdate = array(
            "id" => $request->no_identitas,
            "judul" => $request->judul,
            "description" => $request->description,
            "url" => $request->url,
        );

        $Artikel = Artikel::create($vaUpdate);
        return [
            "status" => 1,
            "data" => $Artikel
        ];
    }

    public function update(Request $request, Artikel $Artikel)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "judul" => $request->judul,
            "description" => $request->description,
            "url" => $request->url,
        );

        $Artikel = Artikel::where('id', $request->id)->update($vaUpdate);
        return [
            "status" => 1,
            "data" => $Artikel,
            "msg" => "Santri & Pengajar updated successfully"

        ];
    }

    public function destroy(Artikel $Artikel)
    {
        $Artikel->delete();
        return [
            "status" => 1,
            "data" => $Artikel,
            "msg" => "Blog deleted successfully"
        ];
    }
}
