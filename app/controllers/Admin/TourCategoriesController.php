<?php namespace Admin;

use Acme\Repositories\TourCategoryRepository;
use Acme\TourCategory;

class TourCategoriesController extends BaseController {

	/**
	 * @var TourCategoryRepository
	 */
	protected $repository;

	/**
	 * 
	 */
	public function __construct(TourCategoryRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
     * Redirect not found.
     *
     * @return Response
     */
    protected function redirectNotFound()
    {
        return $this->redirect('tour_categories.index');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = TourCategory::paginate(10);
        $no = $categories->getFrom();

        return $this->view('tour_categories.index', compact('categories', 'no'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->view('tour_categories.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		app('Acme\Validation\TourCategory\Create')
            ->validate($data = $this->inputAll());

        $category = TourCategory::create($data);

        return $this->redirect('tour_categories.index');
	}
	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try
        {
            $category = TourCategory::findOrFail($id);

            return $this->view('tour_categories.edit', compact('category'));
        }
        catch (ModelNotFoundException $e)
        {
            return $this->redirectNotFound();
        }
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try
        {
            app('Acme\Validation\TourCategory\Update')
                ->validate($data = $this->inputAll());

            $category = TourCategory::findOrFail($id);

            $category->update($data);

            return $this->redirect('tour_categories.index');
        }
        catch (ModelNotFoundException $e)
        {
            return $this->redirectNotFound();
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
        {
            TourCategory::destroy($id);

            return $this->redirect('tour_categories.index');
        }
        catch (ModelNotFoundException $e)
        {
            return $this->redirectNotFound();
        }
	}


}
