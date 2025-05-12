<?php

namespace App\Http\Controllers;

use App\Models\Biscuit;
use App\Models\Client;
use App\Models\Ratings;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ratings = Ratings::all();
        return view('ratings.list', ['data' => $ratings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ratings.form', ['biscuits' => Biscuit::all(),'clients' => Client::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|integer|exists:clients,id',
            'comment' => 'required|string|max:1000',
            'biscuit_id' => 'required|integer|exists:biscuits,id',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $data = [
            'client_id' => $request->client_id,
            'comment' => $request->comment,
            'biscuit_id' => $request->biscuit_id,
            'rating' => $request->rating,
        ];

        Ratings::create($data);
        return redirect("ratings");
    }

    /**
     * Display the specified resource.
     */
    public function show(Ratings $biscuit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {

        $rating = Ratings::find($id);
        if (!$rating) {
            return redirect("ratings")->with('error', 'rating not found');
        }
        return view('ratings.form', ['rating' => $rating, 'biscuits' => Biscuit::all(), 'clients' => Client::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rating = Ratings::find($id);
        if (!$rating) {
            return redirect("ratings")->with('error', 'rating not found');
        }

        $request->validate([
            'client_id' => 'required|integer|exists:clients,id',
            'comment' => 'required|string|max:1000',
            'biscuit_id' => 'required|integer|exists:biscuits,id',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $data = [
            'client_id' => $request->client_id,
            'comment' => $request->comment,
            'biscuit_id' => $request->biscuit_id,
            'rating' => $request->rating,
        ];


        $rating->update($data);

        return redirect("ratings");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rating = Ratings::find($id);
        if (!$rating) {
            return redirect("ratings")->with('error', 'rating not found');
        }
        $rating->delete();
        return redirect("ratings");
    }

    public function search(Request $request)
    {
        if (!empty($request->value)) {
            $value = $request->value;
            $type = $request->type;

            $data = Ratings::where($type, 'like', "%$value%")->get();
            if (empty($data)) {
                return view("ratings.list", ['data' => $data])->with('error', 'Nenhum resultado encontrado.');
            }
        } else {
            $data = Ratings::All();
        }

        return view("ratings.list", ['data' => $data]);

    }
}
