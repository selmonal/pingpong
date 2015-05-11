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

	/**
	 * Find category using slug.
	 *
	 * @param string $slug
	 * @return TourCategory
	 */
	public function findBySlug($slug)
	{
		return $this->model->where('slug', $slug)->first();
	}

}