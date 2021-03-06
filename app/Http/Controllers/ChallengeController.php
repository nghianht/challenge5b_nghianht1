<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use Auth;

class ChallengeController extends Controller
{
    public function list(User $user){
        $challengerList = Challenge::all();
        $user = Auth::user();
        $role = $user->roles->pluck( 'title' )[0];
        return view('listChallenge', ["challenges" => $challengerList, "role" => $role]);
    }

    public function addChallenge() {
        return view('addChallenge');
    }

    public function storeChallenge(Request $request) {
        $challengeModel = new Challenge();
        $challengeModel->title = $request->title;
        $challengeModel->description = $request->description;
        $challengeModel->deadline = $request->deadline;
        $challengeModel->save();

        return redirect("/listChallenge");
    }

    public function removeChallenge(Request $request) {

        Challenge::destroy($request->id);
        return redirect("/listChallenge");
    }

    public function submitChallengeView(Request $request) {
        $challenge = Challenge::find($request->input('id'));

        return view('submitChallenge', ["challenge" => $challenge]);
    }
}
