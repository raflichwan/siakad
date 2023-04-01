<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Services\Template;
use App\Models\KelasMaster;
use Illuminate\Http\Request;

class KelasMasterController extends Controller
{
    public function show()
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#master').addClass('menu-is-opening menu-open');
        $('#webNav').addClass('active');
        $('#kelas').addClass('active');
        $('#example1').DataTable() ;";
        $data['data'] = KelasMaster::get();
        return view('admin.master.kelas_master', $data);
    }
    public function createedit(Request $request) // Insert data wajit variabel reqeuest
    {

        $vaUpdate = array(
            "id" => $request->id,
            "keterangan" => $request->keterangan
        );

        if ($request->has('edit')) {
            KelasMaster::where('id', $request->id)->update($vaUpdate);
        } else {
            KelasMaster::create($vaUpdate);
        }

        return redirect('kelasmaster');
    }

    public function destory($id)
    {
        KelasMaster::where('id', $id)->delete();

        return redirect('kelasmaster');
    }
}
