<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The table this model will use.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'photo'
    ];

    /**
     * The attributes that will always be appended.
     *
     * @var array
     */
    protected $appends = [
        'tags'
    ];

    public function getTagsAttribute()
    {
        return $this->hasMany(ProjectTags::class)->get();
    }
}
