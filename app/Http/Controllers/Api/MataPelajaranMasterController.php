<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaranMaster;
use Illuminate\Http\Request;

class MataPelajaranMasterController extends Controller
{

    public function index()
    {
        $mapel = MataPelajaranMaster::get();
        return [
            "msg" => "tesd",
            "data" => $mapel
        ];
    }

    public function show(MataPelajaranMaster $mapel)
    {
        return [
            "data" => $mapel
        ];
    }

    public function store(Request $request)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "nama_mapel" => $request->nama_mapel
        );


        $mapel = MataPelajaranMaster::create($vaUpdate);
        return [
            "status" => 1,
            "data" => $mapel
        ];
    }

    public function update(Request $request, MataPelajaranMaster $mapel)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "nama_mapel" => $request->nama_mapel
        );

        $mapel = MataPelajaranMaster::where('id', $request->id)->update($vaUpdate);
        return [
            "status" => 1,
            "data" => $mapel,
            "msg" => "Santri & Pengajar updated successfully"
        ];
    }

    public function destroy(MataPelajaranMaster $mapel)
    {
        $mapel->delete();
        return [
            "status" => 1,
            "data" => $mapel,
            "msg" => "Blog deleted successfully"
        ];
    }
}
