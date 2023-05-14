<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KelasMaster;
use Illuminate\Http\Request;

class KelasController extends Controller
{

    public function index()
    {
        $Kelas = KelasMaster::get();
        return [
            "msg" => "tesd",
            "data" => $Kelas
        ];
    }

    public function show(KelasMaster $Kelas)
    {
        return [
            "data" => $Kelas
        ];
    }

    public function store(Request $request)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "keterangan" => $request->keterangan
        );

        $Kelas = KelasMaster::create($vaUpdate);
        return [
            "status" => 1,
            "data" => $Kelas
        ];
    }

    public function update(Request $request, KelasMaster $Kelas)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "keterangan" => $request->keterangan
        );


        $Kelas = KelasMaster::where('id', $request->id)->update($vaUpdate);
        return [
            "status" => 1,
            "data" => $Kelas,
            "msg" => "Santri & Pengajar updated successfully"
        ];
    }

    public function destroy(KelasMaster $Kelas)
    {
        $Kelas->delete();
        return [
            "status" => 1,
            "data" => $Kelas,
            "msg" => "Blog deleted successfully"
        ];
    }
}
