<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $table = 'repository';

    protected $fillable = [
        'user_id',
        'tipe_id',
        'judul',
        'jenis',
        'abstrak',
        'komentar',
        'file',
    ];

    /**
     * Get the user that owns the Repository
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tipe()
    {
        return $this->belongsTo(TipeDokumen::class, 'tipe_id');
    }
}