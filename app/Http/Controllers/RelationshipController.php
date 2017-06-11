<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relationship;

class RelationshipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $relationships = Relationship::paginate(5);

        return view('relationships', ['relationships' => $relationships]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post') && $request->has('relationship')) {
            Relationship::create([
                'name' => $request->input('relationship')
                ]);

            return redirect('/relationships')->with('status', 'Relationship added!');
        }
    }
}
