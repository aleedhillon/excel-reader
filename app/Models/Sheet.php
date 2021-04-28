<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rows()
    {
        return $this->hasMany(Row::class, 'sheet_id', 'id');
    }

    public function columns()
    {
        return $this->hasMany(ColumnName::class, 'sheet_id', 'id');
    }
}
