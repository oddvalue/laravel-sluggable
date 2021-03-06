<?php

namespace Oddvalue\Sluggable\Test\Integration;

use Oddvalue\Sluggable\HasSlug;
use Oddvalue\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestModelSoftDeletes extends Model
{
    use SoftDeletes,
        HasSlug;

    protected $table = 'test_model_soft_deletes';

    protected $guarded = [];

    public $timestamps = false;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return $this->slugOptions ?? $this->getDefaultSlugOptions();
    }

    /**
     * Set the options for generating the slug.
     */
    public function setSlugOptions(SlugOptions $slugOptions) : self
    {
        $this->slugOptions = $slugOptions;

        return $this;
    }

    /**
     * Get the default slug options used in the tests.
     */
    public function getDefaultSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('url');
    }
}
