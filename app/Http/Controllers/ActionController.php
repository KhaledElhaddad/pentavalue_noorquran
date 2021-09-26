<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Listener;
use App\Models\Sound;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class ActionController extends Controller
{
    public function increaseListen(Request $request, Sound $sound)
    {
        $found = Listener::where('ip', $this->getIp())
            ->where('sound_id', $sound->id)
            ->get();

        if (! count($found)) {

            $sound->update([
                'listen' => $sound->listen + 1,
            ]);

            Listener::insert([
                'sound_id' => $sound->id,
                'ip' => $this->getIp()
            ]);
        }
    }

    public function addToFav (Request $request, Sound $sound) {
        $found = Like::where('ip', $this->getIp())
            ->where('sound_id', $sound->id)
            ->get();

        if (! count($found)) {
            $sound->update([
                'like' => $sound->favorite + 1,
            ]);

            Like::insert([
                'sound_id' => $sound->id,
                'ip' => $this->getIp(),
                'favorite' => true
            ]);
        }
    }

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
}
