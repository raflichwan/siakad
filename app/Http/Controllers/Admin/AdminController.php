<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library\Services\Template;

class AdminController extends Controller
{
    public function show()
    {
        $data = Template::getadmin();
        $data['jsTambahan'] = "
        $('#dashboard').addClass('active');";

        return view('admin.dashboard', $data);
    }

    
}
