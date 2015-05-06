<?php namespace Acme;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TourCategory extends Model {

	/**
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description'];

    /**
     * @return HasMany
     */
    public function tours()
    {
    	return $this->hasMany('Acme\Tour');
    }
    
}