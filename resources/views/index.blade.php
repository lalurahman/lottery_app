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
        <div class=" h-96 md:h-100 lg:h-120 mt-60 md:mt-32">
            <h3 class="text-center text-xl font-medium">Ambil Undian</h3>
            <div class="flex justify-center">
                <form class="mt-10 w-5/6 lg:w-2/6 " action="" method="post">
                    <div class="mb-3">
                        <input class="bg-gray-100 rounded-lg p-3 w-full text-sm text-gray-600 font-medium  focus:ring-4 focus:outline-0 focus:ring-emerald-200 duration-150" type="text" placeholder="Nama Lengkap">
                    </div>
                    <div class="mb-3">
                        <input class="bg-gray-100 rounded-lg p-3 w-full text-sm text-gray-600 font-medium  focus:ring-4 focus:outline-0 focus:ring-emerald-200 duration-150 appearance-none" type="number" placeholder="Nomor HP">
                    </div>
                    <div class="mb-3">
                        <button type="button" class="p-3 bg-emerald-500 rounded-lg text-sm font-medium text-white w-full">Ambil Nomor Undian</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection