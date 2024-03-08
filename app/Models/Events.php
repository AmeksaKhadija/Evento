<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $fillable= [
        'title',
        'description',
        'date',
        'location',
        'nb_place',
        'image_path',
        'categorie_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }


    // public function category(){
    //     return $this->belongsTo(Category::class);
    // }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
