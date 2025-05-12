<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biscuit extends Model
{
    use HasFactory;
    protected $table = "biscuits";

    protected $fillable = [
        "name",
        "flavor",
        "baker_id",
        "shape",
        "size",
        "price",
        "description",
        "image",
    ];
    public function baker()
    {
        return $this->belongsTo(Baker::class);
    }

}
