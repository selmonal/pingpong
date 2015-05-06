<?php namespace Acme\Repositories;

use Acme\Tour;

class TourRepository {

	/**
	 * @var Tour
	 */
	protected $model;

	/**
	 * @param Tour $model
	 */
	public function __construct(Tour $model)
	{
		$this->model = $model;
	}
	
}