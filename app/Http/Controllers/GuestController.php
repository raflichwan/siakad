<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Library\Services\Template;
use App\Models\Artikel;
use App\Models\Santripengajar;
use App\Models\Web;
// use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;

class GuestController extends Controller
{
    public function show()
    {
        $data = Template::get();
        $web = Web::get();
        foreach ($web as $key => $value) {
            $data[$value->name] = $value->description;
        }

        // dd(asset('foto/apacsFhjJlPe810bKwOMSA0D0G9wrZoWMVUghfqH.jpg'));
        return view('guest.home', $data);
    }

    public function artikel()
    {
        $data = Template::get();
        $data['classnonhome'] = 'header-inner-pages';
        $data['jsTambahan'] = "
        $('#artikel').addClass('active');";
        $data['artikel'] = Artikel::get();
        // dd($data);
        // dd(asset('foto/apacsFhjJlPe810bKwOMSA0D0G9wrZoWMVUghfqH.jpg'));
        return view('guest.artikel', $data);
    }

    public function artikeldetail($id)
    {
        $data = Template::get();
        $data['classnonhome'] = 'header-inner-pages';
        $data['jsTambahan'] = "
        $('#artikel').addClass('active');";
        $data['artikel'] = Artikel::find($id);
        return view('guest.artikel_detail', $data);
    }
}
