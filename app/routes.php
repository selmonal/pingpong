<?php

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(['prefix' => 'admin', 'before' => 'admin.auth', 'namespace' => 'Admin'], function() 
{
	// app
	$options = ['except' => ['show']];

	Route::resource('tours', 'ToursController', $options);
	Route::resource('tour_categories', 'TourCategoriesController', $options);

});