<?php namespace Acme\Validation\TourCategory;

use Pingpong\Validator\Validator;
use Illuminate\Support\Facades\Request;

class Update extends Validator {

	public function rules()
	{
		return [
	        'name' => 'required',
	        'slug' => 'required|unique:tour_categories,slug,'. Request::segment(3),
		];
	}
}