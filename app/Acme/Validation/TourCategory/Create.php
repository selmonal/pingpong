<?php namespace Acme\Validation\TourCategory;

use Pingpong\Validator\Validator;

class Create extends Validator {

	public function rules()
	{
		return [
	        'name' => 'required',
	        'slug' => 'required|unique:tour_categories,slug',
		];
	}
}