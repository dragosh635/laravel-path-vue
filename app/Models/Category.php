<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model {
    use HasFactory;

    /**
     * When creating a category accept all the inputs
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Return category slug
     *
     * @return mixed
     */
    public function slug() {
        return Str::slug( $this->name );
    }

    /**
     * Get all related menu items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menuItems() {
        return $this->hasMany( MenuItem::class );
    }
}
