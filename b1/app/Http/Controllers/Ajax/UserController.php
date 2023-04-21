<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Auto complete
     *
     * @param mixed $request
     * @return array
     */
    public function autocomplete(Request $request) {
        $tern = $request->get('tern');
        $users = User::where('name', 'LIKE', '%' . $tern . '%');
        $users = $users->order_by('id', 'DESC')->limit(20)->get();

        $arr = [];
        foreach($users as $user) {
            $user0 = new \stdClass();
            $user0->id = $user->id;
            $user0->value = html_entity_decode($user->name);
            $arr[] = $user0;
        }
        return $this->responseSuccess($arr);
    }
}
