<?php namespace Admin;

use Illuminate\Filesystem\Filesystem;

class FileEditorController extends BaseController {

	static $editableFiles = [
		[
			'name' => 'Цэс',
			'path' => 'views/hello.php',
			'description' => 'Толгой хэсгийн хэсгийн цэсний файл'
		],
		[
			'name' => 'Холбоо барих хуудас',
			'path' => 'views/hello.php',
			'description' => 'Холбоо барих хуудас'
		]
	];

	/**
	 * @var Filesystem
	 */
	protected $filesystem;

	/**
	 * Create new FileEditorController instance.
	 * 
	 * @param Filesystem $filesystem
	 */
	public function __construct(Filesystem $filesystem)
	{
		$this->filesystem = $filesystem;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$no = 1;
		$files = self::$editableFiles;

		return $this->view('file_editor.index', compact('no', 'files'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $path
	 * @return Response
	 */
	public function edit($path)
	{
		$file = self::getFileByPath($path);

		if( ! $file) {
			return $this->redirect('settings.file_editor.index');
		}

		$fullPath = app_path() . '/' . $file['path'];

		$content = $this->filesystem->get($fullPath);

		return $this->view('file_editor.edit', compact('content', 'file'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $path
	 * @return Response
	 */
	public function update($path)
	{
		$file = self::getFileByPath($path);

		if( ! $file) {
			return $this->redirect('settings.file_editor.index');
		}

		$fullPath = app_path() . '/' . $file['path'];

		$this->filesystem->put($fullPath, \Input::get('content'));

		return \Redirect::back();
	}


	/**
	 * Check the file on given path is edit able.
	 * 
	 * @param  string $path
	 * @return boolean
	 */
	public static function getFileByPath($path)
	{
		foreach(self::$editableFiles as $file) {
			if($path == $file['path']) return $file;
		}
	}

}
