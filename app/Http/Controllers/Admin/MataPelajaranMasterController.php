<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Services\Template;
use App\Models\MataPelajaranMaster;
use Illuminate\Http\Request;

class MataPelajaranMasterController extends Controller
{
    public function show()
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#master').addClass('menu-is-opening menu-open');
        $('#webNav').addClass('active');
        $('#mapelmaster').addClass('active');
        $('#example1').DataTable() ;";
        $data['data'] = MataPelajaranMaster::get();
        return view('admin.master.mata_pelajaran_master', $data);
    }
    public function createedit(Request $request) // Insert data wajit variabel reqeuest
    {

        $vaUpdate = array(
            "id" => $request->id,
            "nama_mapel" => $request->nama_mapel
        );
        if ($request->has('edit')) {
            // dd($request);
            MataPelajaranMaster::where('id', $request->id)->update($vaUpdate);
        } else {
            MataPelajaranMaster::create($vaUpdate);
        }

        return redirect('mapelmaster');
    }

    public function destory($id)
    {
        MataPelajaranMaster::where('id', $id)->delete();

        return redirect('mapelmaster');
    }
}
