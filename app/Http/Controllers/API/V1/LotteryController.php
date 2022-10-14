<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Lottery;
use App\Models\Participant;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    // lottery
    public function lottery(Request $request)
    {
        $participants = Participant::all();
        $participants = $participants->shuffle();
        $participants = $participants->take(1);
        // $participants = $participants->pluck(['cupon']);
        try {
            // create lottery data
            Lottery::create([
                'participant_id' => $participants[0]->id,
                'lottery_status' => 1,
            ]);
            // $check1 = Lottery::where('lottery_status', 1)->first();
            // $check2 = Lottery::where('lottery_status', 2)->first();
            // $check3 = Lottery::where('lottery_status', 3)->first();
            // if ($check1 || $check2 || $check3) {
            //     return Response::error('sudah dilotery');
            // } else {
            //     if (!$check1) {
            //         $data = [
            //             'participant_id' => $participants[0]->id,
            //             'lottery_status' => 1,
            //         ];
            //         Lottery::create($data);
            //         return Response::success($data, 'Data berhasil disimpan');
            //     } elseif (!$check2) {
            //         $data = [
            //             'participant_id' => $participants[0]->id,
            //             'lottery_status' => 2,
            //         ];
            //         Lottery::create($data);
            //         return Response::success($data, 'Data berhasil disimpan');
            //     } elseif (!$check3) {
            //         $data = [
            //             'participant_id' => $participants[0]->id,
            //             'lottery_status' => 3,
            //         ];
            //         Lottery::create($data);
            //         return Response::success($data, 'Data berhasil disimpan');
            //     }
            // }
            return Response::success($participants, 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            return Response::error($th->getMessage());
        }
    }
}
