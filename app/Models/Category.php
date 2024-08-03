<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable =['name','slug','order','parent_id','status'];

    public function products(): HasMany
    {
        return $this->HasMany(Product::class,'category_id','id');
    }

}
