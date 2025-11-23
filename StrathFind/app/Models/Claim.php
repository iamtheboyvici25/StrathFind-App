<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',   // FK to LostItem
        'user_id',   // user who made the claim
        'status',
        'description',
    ];

    public function item()
    {
        return $this->belongsTo(LostItem::class, 'item_id');
    }
}
