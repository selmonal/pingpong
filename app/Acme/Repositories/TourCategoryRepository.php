<?php namespace Acme\Repositories;

use Acme\TourCategory;

class TourCategoryRepository {

	/**
	 * @var TourCategory
	 */
	protected $model;

	/**
	 * @param TourCategory $model
	 */
	public function __construct(TourCategory $model)
	{
		$this->model = $model;
	}
	
}