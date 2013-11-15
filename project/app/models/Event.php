<?php
class Event extends Eloquent{
	//For user id authentication with event_id instead of id
	protected $primaryKey = 'event_id';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'events';
	 public $timestamps = false;
}
