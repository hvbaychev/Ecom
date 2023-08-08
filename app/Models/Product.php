<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender_id',
        'category_id',
        'brand_id',
        'description',
        'color_id',
        'made_id',
        'price',
        'pic1',
        'pic2',
        'pic3',
        'pic4',
    ];

    public function gender(){
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function color(){
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function made(){
        return $this->belongsTo(Made::class, 'made_id');
    }


    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_sizes');
    }

}
