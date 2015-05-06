<?php namespace Admin;

use View;
use Pingpong\Admin\Controllers\BaseController as PingpongBaseController;

class BaseController extends PingpongBaseController {

	/**
     * Show view.
     *
     * @param $view
     * @param array $data
     * @param array $mergeData
     * @return mixed
     */
    public function view($view, $data = array(), $mergeData = array())
    {
        return View::make('admin.' . $view, $data, $mergeData);
    }

}