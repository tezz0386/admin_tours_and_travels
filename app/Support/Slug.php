<?php

namespace App\Support;

use App\Models\Admin\Category\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
/**
 * 
 */
class Slug 
{

	public static function getSlug($toSlug)
	{
		$slug = SlugService::createSlug(Category::class, 'slug', $toSlug);
		return $slug;
	}
}
?>