<?php namespace Admin;

use Acme\Tour;
use Pingpong\Admin\Uploader\ImageUploader;

class ToursController extends BaseController {

	/**
     * @var ImageUploader
     */
    protected $uploader;

    /**
     * @param ImageUploader $uploader
     */
	public function __construct(ImageUploader $uploader)
	{
		$this->uploader = $uploader;
	}

	/**
     * Redirect not found.
     *
     * @return Response
     */
    protected function redirectNotFound()
    {
        return $this->redirect('tours.index');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tours = Tour::paginate(10);
        $no = $tours->getFrom();

        return $this->view('tours.index', compact('tours', 'no'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->view('tours.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		app('Acme\Validation\Tour\Create')->validate($data = $this->inputAll());

		unset($data['image']);

		if (\Input::hasFile('image'))
        {
            // upload image
            $this->uploader->upload('image')->save('images/articles');

            $data['image'] = $this->uploader->getFilename();
        }

        $tour = Tour::create($data);

        return $this->redirect('tours.index');
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
            $tour = Tour::findOrFail($id);

            return $this->view('tours.edit', compact('tour'));
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
            $tour = Tour::findOrFail($id);

            app('Acme\Validation\Tour\Create')->validate($data = $this->inputAll());

            unset($data['image']);

            if (\Input::hasFile('image'))
            {
                $tour->deleteImage();

                $this->uploader->upload('image')->save('images/articles');

                $data['image'] = $this->uploader->getFilename();
            }

            $tour->update($data);

            return $this->redirect('tours.index');
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
            Tour::destroy($id);

            return $this->redirect('tours.index');
        }
        catch (ModelNotFoundException $e)
        {
            return $this->redirectNotFound();
        }
	}


}
