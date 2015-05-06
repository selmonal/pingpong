<?php namespace Acme\Presenters;

use Pingpong\Presenters\Presenter;

class Tour extends Presenter {

    public function image_path()
    {
        return public_path("images/articles/{$this->resource->image}");
    }
} 