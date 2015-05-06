<?php namespace Acme\Validation\Tour;

use Pingpong\Validator\Validator;

class Create extends Validator {

	public function rules()
	{
		return [
	        'tour_category_id' => 'required|exists:tour_categories,id', 
	    	'like_count' => 'integer', 
	    	'name' => 'required',
	    	'start_date' => 'required|date',
	    	'end_date' => 'required|date',
	    	'price' => 'required|numeric',
	    	'description',
	    	'itinerary',
	    	'summary',
	    	'media'
		];
	}
}