<?php

namespace App\Http\Controllers;

use App\Models\Blacklist;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Traits\ApiResponseWithHttpStatus;

class BlacklistController extends Controller
{
    use ApiResponseWithHttpStatus;
    public function getAllBlacklists($user_company_id) {
        $sampleBlacklist = Blacklist::where([['user_company_id', $user_company_id]])->with('userProfile')->get();
        $blacklist = [];

        for ($i = 0, $j = 0; $i < sizeof($sampleBlacklist); $i++) {
            if ($sampleBlacklist[$i]['userProfile']['isBanned'] == 0) {
                $blacklist[$j] = $sampleBlacklist[$i];
                ++$j;
            }
        }

        for ($i = 0; $i < sizeof($blacklist); $i++) {
            $profile = Profile::where([['user_id', $blacklist[$i]['userProfile']['id']]])->first();
            $blacklist[$i]['profile'] = $profile;
        }

        if (sizeof($blacklist)) {
            $data['blacklist'] = $blacklist;
            return $this -> apiResponse('success', $data, Response::HTTP_OK, true);
        }else {
            return $this -> apiResponse('success', 'Nothing', Response::HTTP_OK, true);
        }
    }

    public function getAllUsers($user_company_id) {
        $blacklist = Blacklist::where([['user_company_id', $user_company_id]])->with('userProfile')->get();

        $users = User::where([
            ['role', 'job seeker'], 
            ['isBanned', 0]
        ])->where(
            function ($query) use ($blacklist) {
                if ($blacklist) {
                    for ($a = 0; $a < sizeof($blacklist); $a++) {
                        $query->whereNot('id', $blacklist[$a]['user_profile_id']);
                    }
                }
            }
        )->get();

        for ($i = 0; $i < sizeof($users); $i++) {
            $profile = Profile::where([['user_id', $users[$i]['id']]])->first();
            $users[$i]['profile'] = $profile;
        }

        if (sizeof($users)) {
            return $this -> apiResponse('success', $users, Response::HTTP_OK, true);
        }else {
            return $this -> apiResponse('success', 'Nothing', Response::HTTP_OK, true);
        }
    }
    
    public function createBlacklist(Request $request) {
        $blacklist = Blacklist::create([
            'user_profile_id' => $request['user_id'],
            'user_company_id' => $request['company_id'],
        ]);

        $blacklist -> save();

        return $this -> apiResponse('success', $blacklist, Response::HTTP_OK, true);
    }
    
    public function removeBlacklist(Request $request) {
        $blacklist = Blacklist::where([['id', $request['blacklist_id']]])->delete();
        
        return $this -> apiResponse('success', $blacklist, Response::HTTP_OK, true);
    }
}
