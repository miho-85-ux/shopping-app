<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'quantity'];

    public function scopeNameSearch ($query, $name) {
        if (!empty($name)) {
            $query->where('name', 'like', '%'. $name . '%');
        }
        return $query;
    }

    public function scopeQuantitySearch ($query, $quantity) {
        if (!empty($quantity)) {
            $query->where('quantity', $quantity );
        }
        return $query;
    }
    
}
