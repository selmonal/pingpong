<?php namespace Acme\Presenters;

use Pingpong\Presenters\Presenter;

class Tour extends Presenter {

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