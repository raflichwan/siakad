<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PelanggaranMaster;
use Illuminate\Http\Request;

class PelanggaranMasterController extends Controller
{
    public function index()
    {
        $PelanggaranMaster = PelanggaranMaster::get();
        return [
            "msg" => "tesd",
            "data" => $PelanggaranMaster
        ];
    }

    public function show(PelanggaranMaster $PelanggaranMaster)
    {
        return [
            "data" => $PelanggaranMaster
        ];
    }

    public function store(Request $request)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "keterangan" => $request->keterangan,
            "poin" => $request->poin,
            "jenis_pelanggaran" => $request->jenis_pelanggaran
        );

        $PelanggaranMaster = PelanggaranMaster::create($vaUpdate);
        return [
            "status" => 1,
            "data" => $PelanggaranMaster
        ];
    }

    public function update(Request $request, PelanggaranMaster $PelanggaranMaster)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "keterangan" => $request->keterangan,
            "poin" => $request->poin,
            "jenis_pelanggaran" => $request->jenis_pelanggaran
        );

        $PelanggaranMaster = PelanggaranMaster::where('id', $request->id)->update($vaUpdate);
        return [
            "status" => 1,
            "data" => $PelanggaranMaster,
            "msg" => "Santri & Pengajar updated successfully"
        ];
    }

    public function destroy(PelanggaranMaster $PelanggaranMaster)
    {
        $PelanggaranMaster->delete();
        return [
            "status" => 1,
            "data" => $PelanggaranMaster,
            "msg" => "Blog deleted successfully"
        ];
    }
}
