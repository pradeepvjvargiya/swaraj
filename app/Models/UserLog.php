<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = 'user_logs';

    protected $fillable = [
        'page',
        'user_id',
        'document_id',
        'report_id',
        'prev_data',
        'new_data'
    ];

    // Define the relationship to User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'created_at' => 'datetime',
    ];
    
}
