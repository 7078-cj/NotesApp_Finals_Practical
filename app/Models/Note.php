<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /** @use HasFactory<\Database\Factories\NoteFactory> */
    use HasFactory;
     protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    public function created_by(){
        return $this->belongsTo(User::class,'user_id');
    }
}
