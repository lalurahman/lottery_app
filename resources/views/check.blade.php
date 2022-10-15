@extends('layouts.app')
@section('title')
    Ambil Nomor Undian
@endsection
@section('body')
<style>

    .mobile{
        height: 200px
    }
    
    .tab{
        height: 300px
    }

    .desktop{
        height: 400px
    }
</style>
    <div class="px-5 md:px-10 lg:px-20 mt-12">
        <div class="mt-40 md:mt-32 pb-10">
            <h3 class="text-center text-xl font-medium">Cek Undian</h3>
            <div class="flex justify-center">
                <form class="mt-10 w-5/6 lg:w-2/6 " action="" method="post">
                    <div class="mb-3">
                        <input class="bg-gray-100 rounded-lg p-3 w-full text-sm text-gray-600 font-medium  focus:ring-4 focus:outline-0 focus:ring-emerald-200 duration-150 appearance-none" type="number" placeholder="Nomor HP">
                    </div>
                    <div class="mb-3">
                        <button type="button" class="p-3 bg-emerald-500 rounded-lg text-sm font-medium text-white w-full hover:bg-emerald-600 duration-150">Cek Undian</button>
                    </div>
                </form>
            </div>
            <div class="mt-5 bg-rose-200 rounded p-4 w-5/6 lg:w-3/6 mx-auto text-center">
               <span class="text-rose-500 text-sm font-medium">Maaf, nomor HP anda belum terdaftar, silahkan <a href="{{ route('index') }}" class="font-bold underline underline-offset-2">Daftar</a> untuk ambil nomor undian</span>
            </div>
            <div class="mt-5 bg-emerald-100 rounded p-4 w-5/6 lg:w-3/6 mx-auto text-start">
               <h5 class="font-medium text-lg">Peserta :</h5>
               <table class="table-auto mt-5 text-sm text-gray-700">
                  <tbody class="text-start">
                     <tr>
                        <th class="w-40 text-start">Nama Lengkap</th>
                        <td>:</td>
                        <td>reza</td>
                     </tr>
                     <tr>
                        <th class="text-start">No Hape</th>
                        <td>:</td>
                        <td>reza</td>
                     </tr>
                     <tr>
                        <th class="text-start">Nomor Undian</th>
                        <td>:</td>
                        <td>234</td>
                     </tr>
                  </tbody>
               </table>
            </div>
        </div>
    </div>
@endsection