<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Zone;

class Table extends Model
{
    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }
}
