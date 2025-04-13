<?php

namespace App\Http\Controllers;

use App\Models\Baker;
use Illuminate\Http\Request;
use App\Models\Biscuit;
class BiscuitController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biscuits = Biscuit::all();
        return view('biscuits.list', ['data'=> $biscuits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('biscuits.form',['bakers'=> Baker::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'flavor' => $request->flavor,
            'baker_id' => $request->baker_id,
            'shape' => $request->shape,
            'size' => $request->size,
            'price' => $request->price,
            'description' => $request->description,

        ];

        Biscuit::create($data);
        return redirect("biscuits");
    }

    /**
     * Display the specified resource.
     */
    public function show(Biscuit $biscuit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $biscuit = Biscuit::find($id);
        if (!$biscuit) {
            return redirect("biscuits")->with('error', 'biscuit not found');
        }
        return view('biscuits.form', ['biscuit'=> $biscuit,'bakers'=> Baker::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $biscuit = Biscuit::find($id);
        if (!$biscuit) {
            return redirect("biscuits")->with('error', 'biscuit not found');
        }
        $data = [
            'name' => $request->name,
            'flavor' => $request->flavor,
            'baker_id' => $request->baker_id,
            'shape' => $request->shape,
            'size' => $request->size,
            'price' => $request->price,
            'description' => $request->description,

        ];

        $biscuit ->update($data);

        return redirect("biscuits");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $biscuit = Biscuit::find($id);
        if (!$biscuit) {
            return redirect("biscuits")->with('error', 'biscuit not found');
        }
        $biscuit->delete();
        return redirect("biscuits");
    }

    public function search(Request $request){
        if (!empty($request->value)) {
            $value = $request->value;
            $type = $request->type;

            $data = Biscuit::where($type, 'like', "%$value%")->get();
            if (empty($data)) {
                return view("biscuits.list", ['data' => $data])->with('error', 'Nenhum resultado encontrado.');
            }
        }else{
            $data = Biscuit::All();
        }

        return view("biscuits.list", ['data' => $data]);

    }
}
