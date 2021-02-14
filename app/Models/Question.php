<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'up_votes',
        'down_votes',
        'user_id',
        'subject_id',
    ];

    /**
     * El usuario de usuario unidad.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * La unidad facturacion de usuario unidad.
     */
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }
}
