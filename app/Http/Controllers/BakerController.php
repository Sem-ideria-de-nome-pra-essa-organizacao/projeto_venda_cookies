<?php

namespace App\Http\Controllers;

use App\Models\Baker;
use Illuminate\Http\Request;

class BakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bakers = Baker::all();
        return view('bakers.list', ['data'=> $bakers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bakers.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'age' => 'required|integer|min:0',
            'role' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'role' => $request->role,
            'experience' => $request->experience,

        ];

        Baker::create($data);
        return redirect("bakers");
    }

    /**
     * Display the specified resource.
     */
    public function show(Baker $baker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $baker = Baker::find($id);
        if (!$baker) {
            return redirect("bakers")->with('error', 'Baker not found');
        }
        return view('bakers.form', ['baker' => $baker]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $baker = Baker::find($id);
        if (!$baker) {
            return redirect("bakers")->with('error', 'Baker not found');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'age' => 'required|integer|min:0',
            'role' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
        ]);
        
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'role' => $request->role,
            'experience' => $request->experience,

        ];

        $baker ->update($data);

        return redirect("bakers");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $baker = Baker::find($id);
        if (!$baker) {
            return redirect("bakers")->with('error', 'Baker not found');
        }
        $baker->delete();
        return redirect("bakers");
    }

    public function search(Request $request){
        if (!empty($request->value)) {
            $value = $request->value;
            $type = $request->type;

            $data = Baker::where($type, 'like', "%$value%")->get();
            if (empty($data)) {
                return view("bakers.list", ['data' => $data])->with('error', 'Nenhum resultado encontrado.');
            }
        }else{
            $data = Baker::All();
        }

        return view("bakers.list", ['data' => $data]);

    }
}
