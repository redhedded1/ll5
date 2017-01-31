<?php
namespace App\Http\Composers;
use App\Article;
use Illuminate\View\View;

class NavigationComposer{
	/**
	 * @param View $view
	 */
	public function compose(View $view){
		$view->with( 'latest', Article::published()->latest( 'published_at' )->first());
	}
}