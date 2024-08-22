<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

     //Relacion  de uno a muchos inversa
 public function category(){

    return $this->belongsTo(Category::class);
 }
    //Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

  //Relacion polimorfica uno a mucho
  public function comments(){
    return $this->morphMony(Comment::class, 'commentable');
}

    //Relacion muchos a muchos polimorfica
    public function tags(){
        return $this->morphToMany(Tags::class, 'taggable');
    }



}
