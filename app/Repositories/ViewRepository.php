<?php
namespace App\Repositories;

use App\View;

class ViewRepository{
	/*
	 * get all parent views
	 * @param View $view
	 * @return Collection
	 */
	public function getChildViews(View $view){
		return $view->childViews()->get();
	}
}