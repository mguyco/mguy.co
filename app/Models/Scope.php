<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    use HasFactory;

    /**
     * The table this model will use.
     *
     * @var string
     */
    protected $table = 'scopes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Display the created_at / updated_at fields (default true)
     *
     * @var boolean
     */
    public $timestamps = false;
}
