<?php

namespace App\Http\Controllers;

use App\Models\BlockBreaker;
use App\Models\Slot;
use Illuminate\Http\Request;
use LDAP\Result;

class RankingController extends Controller
{
    public function test(){
        return['OK'];
    }

    public function slot_index(){
        $data = Slot::orderBy('point', 'desc')->paginate(10)->toArray();
        return $data;
    }
    public function slot_add(Request $request){
        $table = new Slot();
        $data = $request->all();
        $table->fill($data)->save();
        $ranking = Slot::orderBy('point', 'desc')->get()->toArray();
        $num = 0;
        for ($i = 0; $i < count($ranking); $i++) {
            $num = $i;
            if ($ranking[$i]['name'] === $data['name'] && $ranking[$i]['point'] === $data['point']) {
                $num = $i;
            }
            if ($ranking[$i]['point'] < $data['point']) {
                break;
            }
        }
        return [$num];
    }
    public function blockbreaker_index(){
        $data = BlockBreaker::orderBy('point', 'desc')->paginate(10)->toArray();
        return $data;
    }
    public function blockbreaker_add(Request $request){
        $table = new BlockBreaker();
        $data = $request->all();
        $table->fill($data)->save();
        $ranking = BlockBreaker::orderBy('point', 'desc')->get()->toArray();
        $num = 0;
        for ($i = 0; $i < count($ranking); $i++) {
            $num = $i;
            if ($ranking[$i]['name'] === $data['name'] && $ranking[$i]['point'] === $data['point']) {
                $num = $i;
            }
            if ($ranking[$i]['point'] < $data['point']) {
                break;
            }
        }
        return [$num];
    }
}
