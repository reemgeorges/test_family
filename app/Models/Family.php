<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected  $fillable =['father_name','phone','idnat','place_id'];

    public function place(){
        return $this->belongsTo(place::class);
     }
}
