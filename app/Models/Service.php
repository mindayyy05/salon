<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Add 'stylist_id' to the fillable array
    protected $fillable = ['category_id', 'name', 'price', 'duration', 'description', 'stylist_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function stylist()
    {
        return $this->belongsTo(Stylist::class);
    }
}
