<?php

namespace App\Http\Controllers;

use App\Library\Services\Template;
use App\Models\Penjengukan;
use Illuminate\Http\Request;

class PenjengukanController extends Controller
{
    public function show()
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#master').addClass('menu-is-opening menu-open');
        $('#webNav').addClass('active');
        $('#penjengukan').addClass('active');
        $('#example1').DataTable() ;";
        $data['data'] = Penjengukan::get();
        return view('admin.penjengukan', $data);
    }

    public function createedit(Request $request) // Insert data wajit variabel reqeuest
    {

        $vaUpdate = array(
            "nama_santri" => $request->nama_santri,
            "tanggal_penjengukan" => $request->tanggal_penjengukan,
            "keterangan" => $request->keterangan,
        );
        Penjengukan::create($vaUpdate);
        return redirect('/');
    }

    public function destory($id)
    {
        Penjengukan::where('nis', $id)->delete();

        return redirect('pengajar');
    }
}
