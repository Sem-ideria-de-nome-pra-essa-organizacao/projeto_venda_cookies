<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baker extends Model
{
    use HasFactory;
    protected $table = "bakers";
    protected $fillable = [
        "name",
        "email",
        "age",
        "role",
        "experience",
        "image"
    ];
    public function biscuits()
    {
        return $this->hasMany(Biscuit::class);
    }
}
