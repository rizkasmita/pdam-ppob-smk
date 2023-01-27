<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function usages()
    {
        return $this->hasMany(Usage::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
