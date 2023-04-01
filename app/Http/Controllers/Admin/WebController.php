<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Services\Template;
use App\Models\Artikel;
use App\Models\Web;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function show()
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#master').addClass('menu-is-opening menu-open');
        $('#webNav').addClass('active');
        $('#web').addClass('active');
        $('#example1').DataTable() ;
        ";
        $data['data'] = Web::get();
        return view('admin.master.web', $data);
    }
    function createedit(Request $request)
    {
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto');
            $vaUpdate = array("description" => $path);
        } else {
            $vaUpdate = array("description" => $request->input('description'));
        }
        Web::where('name', $request->name)->update($vaUpdate);
        return redirect('web');
    }
}
