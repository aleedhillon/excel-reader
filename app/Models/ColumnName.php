<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColumnName extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sheet()
    {
        return $this->belongsTo(Sheet::class, 'sheet_id', 'id');
    }
}
