<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Relation;
use App\Relationship;
use Illuminate\Support\Facades\Auth;

class RelationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['users'] = User::all()->except(Auth::id());
        $data['relations'] = Relation::paginate(5);
        $data['relationships'] = Relationship::all();

        return view('relations', ['data' => $data]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->has('relative') && $request->input('relative') == 'other' && $request->has('relationships')) {

                if ($request->has('name') && $request->has('email')) {
                    $userExist = User::where('email',  $request->input('email'))->first();

                    if ($userExist) {
                        return back()->with('error', 'User already exist!');
                    } else {
                        $user = User::create([
                            'name' => $request->input('name'),
                            'email' => $request->input('email'),
                            ]);

                        $userId = $user->id;
                    }

                } else {
                    return back()->with('error', 'Name & Email required!');
                }

            } else {
                $userId = $request->input('relative');
            }

            Relation::create([
                'user_id' => Auth::id(),
                'relative_id' => $userId,
                'relation_id' => $request->input('relationships')
                ]);

            return back()->with('status', 'Relationship added!');
        }
    }
}
