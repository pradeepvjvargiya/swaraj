<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'title',
        'filepath'
    ];

    public function getQuarterDocs($page, $year, $quarter)
    {
        return Report::where('page', $page)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->get();
    }
}
