<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
            'password' => 'required'
        ]);
        $user = Auth::attempt(['phone' => $request->phone, 'password' => $request->password]);
        if ($user) {
            $user = Auth::user();
            return Response::success($user, 'Login berhasil');
        } else {

            return Response::error(NULL,'Unauthorized');
        }
    }

    public function register()
    {
        $data = request()->all();
        try {
            $this->validate(request(), [
                'name' => 'required',
                'phone' => 'required|unique:users|numeric|regex:/^08[0-9]{9,11}$/',
                'password' => 'required',
            ], [
                'name.required' => 'Nama tidak boleh kosong',
                'phone.required' => 'Nomor telepon tidak boleh kosong',
                'phone.unique' => 'Nomor telepon sudah terdaftar',
                'phone.numeric' => 'Nomor telepon harus berupa angka',
                'phone.regex' => 'Nomor telepon tidak valid',
                'password.required' => 'Password tidak boleh kosong',
            ]);
            $cupon = User::max('cupon') + 1;
            $data['cupon'] = str_pad($cupon, 5, '0', STR_PAD_LEFT);
            $data['password'] = Hash::make(request('password'));
            User::create($data);
            $user = [
                'name' => $data['name'],
                'phone' => $data['phone'],
                'cupon' => $data['cupon'],
            ];
            return Response::success($user, 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return Response::error($e->getMessage());
        } 
    }
}
