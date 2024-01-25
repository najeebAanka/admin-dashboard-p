<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PortfolioCategory
 * 
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * 
 * @property Collection|Product[] $products
 * @property Collection|Work[] $works
 *
 * @package App\Models
 */
class PortfolioCategory extends Model
{
	protected $table = 'portfolio_categories';
	public $timestamps = false;

	protected $fillable = [
		'name_en',
		'name_ar'
	];

	public function products()
	{
		return $this->hasMany(Product::class, 'category_id');
	}

	public function works()
	{
		return $this->hasMany(Work::class, 'category_id')->orderBy('position','asc');
	}
}
