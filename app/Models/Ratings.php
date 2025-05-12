<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    use HasFactory;
    protected $table = "ratings";

    protected $fillable = [
        "biscuit_id",
        "client_id",
        "rating",
        "comment",
    ];

    public function biscuit()
    {
        return $this->belongsTo(Biscuit::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
