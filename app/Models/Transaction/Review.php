<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'item_id',
        'comment',
        'rating_service',
        'rating_quality',
        'rating_website_experience',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
