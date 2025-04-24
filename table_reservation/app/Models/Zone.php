<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zone extends Model
{
	use HasFactory;
     public function tables(): HasMany
    {
        return $this->hasMany(Table::class);
    }

}
