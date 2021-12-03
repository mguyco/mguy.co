<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Models\Tag;
use App\Models\ProjectTag;

class Project extends Model
{
    use HasFactory, SoftDeletes;

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
        'photo',
        'url',
        'repository'
    ];

    /**
     * The attributes that will always be appended.
     *
     * @var array
     */
    protected $appends = [
        'tags',
    ];

    public function getTagsAttribute()
    {
        return $this->hasMany(ProjectTag::class)->get();
    }

    public function getDescriptionAttribute() {
        return Str::markdown($this->attributes['description']);
    }
}
