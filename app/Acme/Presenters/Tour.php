<?php namespace Acme\Presenters;

use Pingpong\Presenters\Presenter;

class Tour extends Presenter {

    /**
     * Return featured image url.
     * 
     * @return string
     */
    public function image_path()
    {
        return public_path("images/articles/{$this->resource->image}");
    }

    /**
     * Return the url for user.
     * 
     * @return string
     */
    public function userUrl()
    {
    	return url("tours/{$this->resource->slug}.html");
    }
    
} 