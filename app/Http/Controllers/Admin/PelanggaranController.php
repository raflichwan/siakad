<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Services\Template;
use App\Models\Pelanggaran;
use App\Models\PelanggaranMaster;
use App\Models\Pengajar;
use App\Models\Santri;
use App\Models\SantriPengajar;
use App\Models\Santripengajar as ModelsSantripengajar;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function show()
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#inputpelanggaran').addClass('active');
        $('#example1').DataTable() ;";
        $data['masterPelanggaran'] = PelanggaranMaster::get();
        $data['data'] = Pelanggaran::with(['pelanggaran_masters', 'santripengajars'])->get();
        $data['santri'] = Santri::get();
        $data['pengajar'] = Pengajar::get();
        return view('admin.input_pelanggaran', $data);
    }
    public function createedit(Request $request) // Insert data wajit variabel reqeuest
    {
        $data = $request->all();
        $vaUpdate = array(
            "id" => $request->id,
            "pelanggaran_master_id" => $request->pelanggaran_master_id,
            "no_identitas" => $request->no_identitas,
            "tanggal" => $request->tanggal,
        );
        if ($request->has('edit')) {
            Pelanggaran::where('id', $request->id)->update($vaUpdate);
        } else {
            Pelanggaran::create($vaUpdate);
        }

        return redirect('pelanggaran');
    }

    public function destory($id)
    {
        Pelanggaran::where('nis', $id)->delete();

        return redirect('santri');
    }

    public function viewpelanggaran($id)
    {
        //Select * from where jenis_pelanggaran  ='ID'

        $data['pelanggar'] = Santripengajar::where("type", $id)->get();
        $data['masterPelanggaran'] = PelanggaranMaster::where("jenis_pelanggaran", $id)->get();
        return view('admin.transaksi.input_pelanggaran_option', $data);
    }

    public function laporan()
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#laporan').addClass('menu-is-opening menu-open');
        $('#webNavlaporan').addClass('active');
        $('#laporanpelanggaran').addClass('active');
        $('#example1').DataTable() ;";
        $data['data'] =
            // select santripengajars.no_identitas,santripengajars.nama,sum(pelanggaran_masters.poin) as totalpoin from pelanggaran
            // join pelanggaran master = pelaanggaran.pelanggaran_master_id
            // join santripengajar = pengajar.no_indentias
            // group by 
            Pelanggaran::select('santripengajars.no_identitas', 'santripengajars.nama')
            ->selectRaw('sum(pelanggaran_masters.poin) AS totalpoin')
            ->join('pelanggaran_masters', 'pelanggaran_masters.id', 'pelanggarans.pelanggaran_master_id')
            ->join('santripengajars', 'santripengajars.no_identitas', 'pelanggarans.no_identitas')
            ->groupby('no_identitas')
            ->groupby('nama')->get();
        return view('admin.laporan.laporan_pelanggaran', $data);
    }
}
