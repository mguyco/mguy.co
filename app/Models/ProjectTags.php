<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTags extends Model
{
    use HasFactory;

    /**
     * The table this model will use.
     *
     * @var string
     */
    protected $table = 'project_tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'tag_id'
    ];

    /**
     * The attributes that will always be appended.
     *
     * @var array
     */
    protected $appends = [
        'data'
    ];

    /**
     * Display the created_at / updated_at fields (default true)
     *
     * @var boolean
     */
    public $timestamps = false;

    public function getDataAttribute()
    {
        return $this->hasOne(Tag::class, 'id', 'tag_id')->select(
            'name',
            'description',
            'photo',
            'url',
            'isVendor'
        )->get()[0];
    }
}