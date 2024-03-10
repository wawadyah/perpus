<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class RentLog extends Model
{
    use HasFactory;


    protected $table = 'rent_logs';

    protected $fillable = [
        'book_id',
        'user_id',
        'rent_date',
        'return_date',
        'actual_return_date',
    ];
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function books(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
