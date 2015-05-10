<?php namespace Acme;

use Cviebrock\EloquentTaggable\Taggable;
use Cviebrock\EloquentTaggable\TaggableImpl;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Pingpong\Presenters\Model;

class Tour extends Model implements Taggable {

    use TaggableImpl;

    /**
     * @var string
     */
    protected $presenter = 'Acme\Presenters\Tour';

	/**
     * @var array
     */
    protected $fillable = [
    	'tour_category_id', 
    	'like_count', 
    	'name',
    	'image',
    	'start_date',
    	'end_date',
    	'price',
    	'description',
    	'itinerary',
    	'summary',
    	'media'
    ];

    /**
     * @return BelongsTo
     */
    public function category()
    {
    	return $this->belongsTo('Acme\TourCategory', 'tour_category_id');
    }

    /**
     * Boot the eloquent.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($data)
        {
            $data->deleteImage();
        });
    }
        
    /**
     * @return bool
     */
    public function deleteImage()
    {
        $file = $this->present()->image_path;

        if (file_exists($file))
        {
            @unlink($file);

            return true;
        }

        return false;
    }
}