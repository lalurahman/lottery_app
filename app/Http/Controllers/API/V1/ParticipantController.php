<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function all()
    {
        $data = Participant::all();
        if ($data) {
            return Response::success($data, 'Data berhasil diambil');
        } else {
            return Response::error('Data tidak ditemukan');
        }
    }

    public function store()
    {
        $data = request()->all();
        try {
            $this->validate(request(), [
                'name' => 'required',
                'phone' => 'required|unique:participants|numeric|regex:/^08[0-9]{9,11}$/',
            ], [
                'name.required' => 'Nama tidak boleh kosong',
                'phone.required' => 'Nomor telepon tidak boleh kosong',
                'phone.unique' => 'Nomor telepon sudah terdaftar',
                'phone.numeric' => 'Nomor telepon harus berupa angka',
                'phone.regex' => 'Nomor telepon tidak valid',
            ]);
            $cupon = Participant::max('cupon') + 1;
            $data['cupon'] = str_pad($cupon, 5, '0', STR_PAD_LEFT);
            Participant::create($data);
            return Response::success($data, 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return Response::error($e->getMessage());
        } 
    }

    public function update($id)
    {
        $data = request()->all();
        try {
            $this->validate(request(), [
                'name' => 'required',
                'phone' => 'required|numeric|regex:/^08[0-9]{9,11}$/',
            ], [
                'name.required' => 'Nama tidak boleh kosong',
                'phone.required' => 'Nomor telepon tidak boleh kosong',
                'phone.numeric' => 'Nomor telepon harus berupa angka',
                'phone.regex' => 'Nomor telepon tidak valid',
            ]);
            $participant = Participant::find($id);
            $participant->update($data);
            return Response::success($data, 'Data berhasil diubah');
        } catch (\Exception $e) {
            return Response::error($e->getMessage());
        } 
    }

    public function destroy($id)
    {
        $participant = Participant::find($id);
        if ($participant) {
            $participant->delete();
            return Response::success($participant, 'Data berhasil dihapus');
        } else {
            return Response::error('Data tidak ditemukan');
        }
    }
}
