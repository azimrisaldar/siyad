<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    

    /**
     * Table name for the model.
     *
     * @var type
     */
    protected $table = "category";


    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['title', 'category_id','slug',];

    /**
     * Relationship to it's own.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function parent() {
        return $this->belongsTo(Category::class,'category_id');
    }


    /**
     * Relationship to it's own.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function child() {
        return $this->hasMany(Category::class, 'category_id');
    }



}
