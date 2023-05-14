<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Services\Template;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{

    public function show()
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#master').addClass('menu-is-opening menu-open');
        $('#webNav').addClass('active');
        $('#artikel').addClass('active');
        $('#example1').DataTable() ;
        $('#summernoteedit').summernote();
        $('#summernote').summernote();";
        $data['data'] = Artikel::get();
        return view('admin.master.artikel', $data);
    }
    public function createedit(Request $request) // Insert data wajit variabel reqeuest
    {

        $isiArtikel = $request->isiartikel;
        $dom = new \DomDocument();
        $dom->loadHtml($isiArtikel, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name = "/storage/" . time() . $k . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $vaUpdate = array(
            "judul" => $request->judul,
            "description" => $isiArtikel
        );
        if ($request->hasFile('url')) {
            $path = $request->file('url')->store('artikelcover');
            $vaUpdate['url'] = $path;
        }
        if ($request->has('edit')) {
            Artikel::where('id', $request->id)->update($vaUpdate);
        } else {
            // echo "<script>alert('Your message Here');</script>";
            Artikel::create($vaUpdate);
        }

        return redirect('artikeladmin');
    }

    public function destory($id)
    {
        Artikel::where('id', $id)->delete();

        return redirect('artikeladmin');
    }
}
