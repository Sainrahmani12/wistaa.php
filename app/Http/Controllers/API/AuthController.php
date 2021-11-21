<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Facade\FlareClient\Http\Response as HttpResponse;
use Illuminate\Auth\Access\Response as AccessResponse;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function registrasi(Request $request)
    {
        $pesan = [
            'name.required'         => "Nama Tidak Boleh Kosong",
            'email.required'        => "Email Tidak Boleh Kosong",
            'email.unique'          => "Email Telah Terdaftar",
            'email.email'           => "Email Tidak Valid",
            'password.required'     => "Password Tidak Boleh Kosong",
            'password.min'          => "Password Tidak Boleh Kurang Dari 4",
            'password.confirmed'    => "Password Tidak Cocok",
        ];

        $validasi = Validator::make($request->all(),[
            'name'      => 'required',
            'email'     => 'required|unique:users|email',
            'password'  => 'required|min:4|confirmed',
        ], $pesan);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this -> responError(0, $val[0]);
        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        return response()->json([
            'status'   => 1,
            'pesan'    => "Halo $request->name Registrasi Anda Berhasil!",
            'data'     => $user
        ],Response::HTTP_OK);
    }

    public function daftar(Request $request)
    {
        $pesan = [
            'name.required'         => "Nama Tidak Boleh Kosong",

            'email.required'        => "Email Tidak Boleh Kosong",
            'email.unique'          => "Email Telah Terdaftar",
            'email.email'           => "Email Tidak Valid",

            'password.required'     => "Password Tidak Boleh Kosong",
            'password.min'          => "Password Tidak Boleh Kurang Dari 4",
            'password.confirmed'    => "Password Tidak Cocok",
        ];
        
        $request->validate([
            'name' => "required",
            'email' => "required|email",
            'password' => "required"
        ],$pesan);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> Hash::make($request->password)
        ]);

        return response()->json([
            'status'   => 1,
            'pesan'    => "Halo $request->name Registrasi Anda Berhasil!",
            'data'     => $user
        ],Response::HTTP_OK);
    }

    public function login(Request $request){
        $pesan =[
            'email.required'        => "Email Tidak Boleh Kosong",
            'password.required'     => "Password Tidak Boleh Kosong",
        ];

        $validasi = Validator::make($request->all(),[
            'email'     => 'required',
            'password'  => 'required',
        ], $pesan);

        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return $this->responError(0,"Login Gagal !");
        }

        return response()->json([
            'status'   => 1,
            'pesan'    => "Halo $user->name, Login Anda Berhasil!",
            'data'     => $user
        ],Response::HTTP_OK);
        
    }

    public function editProfile(Request $request, $user_id)
    {
        $user           = User::findOrfail($user_id);

        $validasi = Validator::make($request->all(),[
            'name'          =>'required',
            'email'         =>'required',
            'alamat'        =>'required',
            'telp'          =>'required',
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this -> responError(0, $val[0]);
        }

        $user->update([
            'name'          =>$request->name,
            'email'         =>$request->email,
            'alamat'        =>$request->alamat,
            'telp'          =>$request->telp,
            'photo'         =>$request->photo
        ]);

        return response()->json([
            'status'        =>1,
            'message'       =>"Profile berhasil diupdate",
            'result'        =>$user
        ]);
    }

    public function changePassword(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        if ((!Hash::chek($request->password, $user->password))){
            return $this->responError(0, "password is wrong !");
        }
        
        if (strcmp($request->get('password'), $request->get('new_password'))== 0){
            return Response()->json([
                'status'            =>0,
                'pesan'             =>'password tidak boleh sama'
            ], 400);
        }

        $validasi = Validator::make($request->all(),[
            'password'          =>'required',
            'new_password'      =>'required | confirmed'
        ]);

        if ($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }$user->save();

        // jika password baru sama dengan password lama maka error

        return Response()->json([
            'status'        => 1,
            'pesan'         => "$user->name, Edit Berhasil",
            'result'        => $user
        ], Response::HTTP_OK);
    }

    public function responError($sts, $pesan)
    {
        return response()->json([
            'status'    => $sts,
            'message'   => $pesan
        ], Response::HTTP_OK);
    }
}
