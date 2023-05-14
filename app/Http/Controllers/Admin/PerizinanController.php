<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Services\Template;
use App\Models\Perizinan;
use Illuminate\Http\Request;

class PerizinanController extends Controller
{
    public function show()
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#laporan').addClass('menu-is-opening menu-open');
        $('#webNavlaporan').addClass('active');
        $('#laporanperizinan').addClass('active');
        $('#example1').DataTable() ;";
        $data['data'] = Perizinan::get();
        return view('admin.laporan.perizinan', $data);
    }
    public function acc($id, $acc)
    {
        Perizinan::where('id', $id)->update(array("status" => $acc));
        return redirect('laporanperizinan');
    }
}
