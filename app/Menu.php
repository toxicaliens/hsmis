<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /*
     * The attributes that are mass assignable
     */
	protected $fillable = [
		'parent_id',
		'icon',
		'class',
		'view_id',
		'text',
		'sequence'
	];
	
	public function childMenus(){
		return $this->hasMany('App\Menu', 'parent_id', 'id');
	}
	
	public function parentMenu(){
		return $this->belongsTo('App\Menu', 'id');
	}
}
