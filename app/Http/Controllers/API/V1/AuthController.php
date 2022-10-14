<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
