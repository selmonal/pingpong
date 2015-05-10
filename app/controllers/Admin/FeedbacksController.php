<?php namespace Admin;

use Acme\Feedback;

class FeedbacksController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = Feedback::orderBy('created_at', 'desc');

		if(\Input::get('only') == 'checked') {
			$query->checked();
		} elseif(\Input::get('only') == 'unchecked') {
			$query->unchecked();
		}

		$feedbacks = $query->paginate(10);
		$no = $feedbacks->getFrom();

		return $this->view('feedbacks.index', compact('feedbacks', 'no'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		try
        {
            $feedback = Feedback::findOrFail($id);

            if( ! $feedback->checked)
            {
            	$feedback->check()->save();
            }

            return $this->view('feedbacks.show', compact('feedback'));
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
            Feedback::destroy($id);

            return $this->redirect('feedbacks.index');
        }
        catch (ModelNotFoundException $e)
        {
            return $this->redirectNotFound();
        }
	}


}
