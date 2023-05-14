<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index()
    {
        $Pelanggaran = Pelanggaran::get();
        return [
            "msg" => "tesd",
            "data" => $Pelanggaran
        ];
    }

    public function show(Pelanggaran $Pelanggaran)
    {
        return [
            "data" => $Pelanggaran
        ];
    }

    public function store(Request $request)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "pelanggaran_master_id" => $request->pelanggaran_master_id,
            "no_identitas" => $request->no_identitas,
            "tanggal" => $request->tanggal
        );

        $Pelanggaran = Pelanggaran::create($vaUpdate);
        return [
            "status" => 1,
            "data" => $Pelanggaran
        ];
    }

    public function update(Request $request, Pelanggaran $Pelanggaran)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "pelanggaran_master_id" => $request->pelanggaran_master_id,
            "no_identitas" => $request->no_identitas,
            "tanggal" => $request->tanggal
        );

        $Pelanggaran = Pelanggaran::where('id', $request->id)->update($vaUpdate);
        return [
            "status" => 1,
            "data" => $Pelanggaran,
            "msg" => "Santri & Pengajar updated successfully"
        ];
    }

    public function destroy(Pelanggaran $Pelanggaran)
    {
        $Pelanggaran->delete();
        return [
            "status" => 1,
            "data" => $Pelanggaran,
            "msg" => "Blog deleted successfully"
        ];
    }
}
