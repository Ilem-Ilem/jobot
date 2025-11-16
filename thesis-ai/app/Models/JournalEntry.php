<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
