<?php
class OvnItem extends Eloquent 
{
	protected $table 	= "ovn_items";

	public function ovn()
	{
		return $this->hasOne('Ovn');
	}
}