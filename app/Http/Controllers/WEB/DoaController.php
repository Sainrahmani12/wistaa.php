<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DoaController extends Controller
{
    public function doa(){
        $i = 1;
        $respone = Http::get('https://doa-doa-api-ahmadramadhan.fly.dev/api')->json();
        // $data = $respone->json();
        // return dd($respone);
        return view('welcome',[
            'respone' => $respone,
            'i'=>$i
        ]);
    }

    public function postData(){
        return view('post-data');
    }

    public function posting(Request $request){
        // dd($request);
        Http::post('https://ictjuara.000webhostapp.com/api/regis',$request->input());
        return redirect()->back();

    }

    public function postKategori(){
        return view('kategori');
    }

    public function nambahKategori(Request $request){
        Http::post('https://ictjuara.000webhostapp.com/api/add-kategori', $request->input());
        return redirect()->back();
    }

    public function wisata(){
        $i = 1;
        // $message = Http::get('https://ictjuara.000webhostapp.com/api/wisata')->json();
        $respone = Http::get('https://ictjuara.000webhostapp.com/api/wisata')->json();
        $kategori = Http::get('https://ictjuara.000webhostapp.com/api/kategori')->json();
        // $data = $respone->json();
        // return dd($respone);
        return view('wisata',[
            'respone' => $respone,
            'kategori' => $kategori,
            'i'=>$i
        ]);
    }

}
