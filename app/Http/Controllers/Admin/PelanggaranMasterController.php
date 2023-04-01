<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Services\Template;
use App\Models\PelanggaranMaster;
use Illuminate\Http\Request;

class PelanggaranMasterController extends Controller
{
    public function show()
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#master').addClass('menu-is-opening menu-open');
        $('#webNav').addClass('active');
        $('#pelanggaranmaster').addClass('active');
        $('#example1').DataTable() ;";
        $data['data'] = PelanggaranMaster::get();
        return view('admin.master.pelanggaran_master', $data);
    }
    public function createedit(Request $request) // Insert data wajit variabel reqeuest
    {

        $vaUpdate = array(
            "id" => $request->id,
            "keterangan" => $request->keterangan,
            "poin" => $request->poin,
            "jenis_pelanggaran" => $request->jenis_pelanggaran
        );

        if ($request->has('edit')) {
            PelanggaranMaster::where('id', $request->id)->update($vaUpdate);
        } else {
            PelanggaranMaster::create($vaUpdate);
        }

        return redirect('pelanggaranmaster');
    }

    public function destory($id)
    {

        PelanggaranMaster::where('id', $id)->delete();

        return redirect('pelanggaranmaster');
    }
}
