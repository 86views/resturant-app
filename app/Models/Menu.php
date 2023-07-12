<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
   
    
    protected $fillable = [ 'name','description','image', 'price', ];
    
    public function categories()
    {
        return $this->belongsToMany(Category::class)->as('categories');
    }
}
