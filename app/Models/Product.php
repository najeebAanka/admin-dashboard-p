<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property string|null $thumbnail
 * @property string|null $title_en
 * @property string|null $title_ar
 * @property string|null $desc_en
 * @property string|null $desc_ar
 * @property Carbon|null $launching_date
 * @property string|null $demo_link
 * @property int|null $category_id
 * 
 * @property PortfolioCategory|null $portfolio_category
 * @property Collection|ProductsGallery[] $products_galleries
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int'
	];

	protected $dates = [
		'launching_date'
	];

	protected $fillable = [
		'thumbnail',
		'title_en',
		'title_ar',
		'desc_en',
		'desc_ar',
		'launching_date',
		'demo_link',
		'category_id'
	];

	public function portfolio_category()
	{
		return $this->belongsTo(PortfolioCategory::class, 'category_id');
	}

	public function products_galleries()
	{
		return $this->hasMany(ProductsGallery::class);
	}
}
