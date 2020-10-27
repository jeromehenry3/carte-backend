<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Update the specified user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request) {

        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->get('password'), $user->password)) {
                $apikey = base64_encode(Str::random(40));
                $user->update(['remember_token' => "$apikey"]);
                return response()->json(['status' => 'success','api_key' => $apikey]);
            }
            return ['error' => 'unauthenticated'];
        }
      return ['error' => 'unauthenticated'];
    }

    public function check(Request $request) {
        return response()->json($request);
    }

    /**
     * Creates a user
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request) {
        $user = new User;
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        return $user->save();
    }
}
