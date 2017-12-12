<?php
class Ovn extends Eloquent 
{
	protected $table 	= "ovne";
	public function ovnItem()
	{
		return $this->hasMany('OvnItem');
	}
}