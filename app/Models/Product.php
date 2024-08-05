<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', ' brand_id', 'category_id', 'price', 'brand_id', 'status', 'description', 'content','total_sold','sale_price','quantity','user_id'

    ];
    public function images(): HasMany
    {
        return $this->hasMany(ImageProduct::class,'product_id','id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
