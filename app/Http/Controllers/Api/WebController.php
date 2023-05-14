<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Web;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $Web = Web::get();
        return [
            "msg" => "tesd",
            "data" => $Web
        ];
    }

    public function show(Web $Web)
    {
        return [
            "data" => $Web
        ];
    }

    public function store(Request $request)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "name" => $request->name,
            "description" => $request->description,
            "path" => $request->path
        );

        $Web = Web::create($vaUpdate);
        return [
            "status" => 1,
            "data" => $Web
        ];
    }

    public function update(Request $request, Web $Web)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "name" => $request->name,
            "description" => $request->description,
            "path" => $request->path
        );

        $Web = Web::where('id', $request->id)->update($vaUpdate);
        return [
            "status" => 1,
            "data" => $Web,
            "msg" => "Santri & Pengajar updated successfully"
        ];
    }

    public function destroy(Web $Web)
    {
        $Web->delete();
        return [
            "status" => 1,
            "data" => $Web,
            "msg" => "Blog deleted successfully"
        ];
    }
}
