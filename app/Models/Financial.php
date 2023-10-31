<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'title',
        'filepath'
    ];

    public function getQuarterDocs($year, $quarter)
    {
        return Financial::where('year', $year)
            ->where('quarter', $quarter)
            ->get();
    }

}
