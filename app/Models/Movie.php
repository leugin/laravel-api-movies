<?php

namespace App\Models;

use App\Services\Searchable\SearchableRules;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory, SearchableRules;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description',
    ];

    public function searchableByColumns(): array
    {
        return  [
            'title',
            'description',
        ];
    }

    public function sorteableColumns(): array
    {
        return  [
            'id',
            'title',
            'description',
        ];
    }

}
