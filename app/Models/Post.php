<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'excerpt',
        'body',
        'user_id',
        'published',
    ];

    protected  function title(): Attribute{
        return new Attribute(
            set: fn ($value) => strtolower($value),
            get: fn ($value) => ucfirst($value),
        );

    }

    protected  function image(): Attribute{
        return new Attribute(
            get: fn () => $this->image_path ?? 'https://img.freepik.com/vector-premium/vector-icono-imagen-predeterminado-pagina-imagen-faltante-diseno-sitio-web-o-aplicacion-movil-no-hay-foto-disponible_87543-11093.jpg?w=996',
        );

    }

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
