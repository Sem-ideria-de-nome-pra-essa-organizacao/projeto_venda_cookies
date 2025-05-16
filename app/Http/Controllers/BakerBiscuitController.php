<?php

namespace App\Http\Controllers;

use App\Models\Baker;
use App\Models\Biscuit;
use Illuminate\Http\Request;

class BakerBiscuitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Baker $baker)
    {

        $biscuits = $baker->biscuits()->get();
        return view('bakers.biscuits.list',[
            'baker' => $baker,
            'data' => $biscuits
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Baker $baker)
    {
        return view('bakers.biscuits.form', [
            'baker' => $baker
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'flavor' => 'required|string|max:255',
            'shape' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $directory = "biscuits/";

            $image->storeAs(
                $directory,
                $fileName,
                'public'
            );
            $data['image'] = $directory . $fileName;
        }

        Biscuit::create($data);
               return redirect()->route('bakerbiscuit.index', ['baker' => $data['baker_id']]);
;
    }

    /**
     * Display the specified resource.
     */
    public function show(Baker $baker,)
    {

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Baker $baker,string $id)
    {
        $biscuit = Biscuit::find($id);
        return view('bakers.biscuits.form', [
            'baker' => $baker,
            'biscuit' => $biscuit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $biscuit = Biscuit::find($id);
        if (!$biscuit) {
                   return redirect()->route('bakerbiscuit.index', ['baker' => $id])->with('error', 'biscuit not found');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'flavor' => 'required|string|max:255',
            'baker_id' => 'required|integer|exists:bakers,id',
            'shape' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $directory = "biscuits/";

            $image->storeAs(
                $directory,
                $fileName,
                'public'
            );
            $data['image'] = $directory . $fileName;
        }

        $biscuit ->update($data);

        return redirect()->route('bakerbiscuit.index', ['baker' => $data['baker_id']]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Baker $baker,string $id)
    {
        $biscuit = Biscuit::find($id);
        if (!$biscuit) {
            return redirect("biscuits")->with('error', 'biscuit not found');
        }
        if ($biscuit->image) {
            $imagePath = public_path('storage/' . $biscuit->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $biscuit->delete();
                return redirect()->route('bakerbiscuit.index', ['baker' => $baker->id])->with('success', 'Biscuit deleted successfully');


    }

    public function search(Request $request,Baker $baker){
        if (!empty($request->value)) {
            $value = $request->value;
            $type = $request->type;

            $data = $baker->biscuits()->where($type, 'like', "%$value%")->get();
            if (empty($data)) {
                return view("bakers.biscuits.list", ['data' => $data,'baker' => $baker])->with('error', 'Nenhum resultado encontrado.');
            }
        }else{
            $data = $baker->biscuits()->get();
        }

        return view("bakers.biscuits.list", ['data' => $data, 'baker' => $baker]);

    }
}
