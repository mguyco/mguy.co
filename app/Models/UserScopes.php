<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserScopes extends Model
{
    use HasFactory;

    /**
     * The table this model will use.
     *
     * @var string
     */
    protected $table = 'user_scopes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scope_id',
        'user_id'
    ];

    /**
     * The attributes that will always be appended.
     *
     * @var array
     */
    protected $appends = [
        'data'
    ];

    public function getDataAttribute()
    {
        return $this->scope()->select('name')->get()[0];
    }

    public function scope()
    {
        return $this->hasOne(Scope::class, 'id', 'scope_id');
    }
}
