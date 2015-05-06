<?php namespace Acme\Composers;

use Acme\TourCategory;

class TourFormComposer {

	public function compose($view)
    {
        $categories = TourCategory::lists('name', 'id');

        $view->with(compact('categories'));
    }

}	