<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Options extends Model
{
    use HasFactory;
    protected $table = 'options';
    protected $guarded = ['id'];
    public function elections(): BelongsTo
    {
        return $this->belongsTo(Elections::class);
    }
}
