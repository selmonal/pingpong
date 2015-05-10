<?php namespace Acme;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Feedback extends Model {

	/**
	 * The table that used by model.
	 * 
	 * @var string
	 */
	protected $table = 'feedbacks';

	/**
	 * The fillable fields.
	 * 
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'message', 'checked'];

	/**
	 * @return $this
	 */
	public function check()
	{
		$this->checked = 1;

		return $this;
	}

	/**
	 * @param  Builder $query
	 * @return Builder       
	 */
	public function scopeChecked($query)
	{
		return $query->where('checked', 1);
	}
	
	/**
	 * @param  Builder $query
	 * @return Builder       
	 */
	public function scopeUnChecked($query)
	{
		return $query->where('checked', 0);
	}
	
}