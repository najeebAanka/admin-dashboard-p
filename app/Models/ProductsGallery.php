<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductsGallery
 * 
 * @property int $id
 * @property int|null $product_id
 * @property string|null $sm_url
 * @property string|null $lg_url
 * 
 * @property Product|null $product
 *
 * @package App\Models
 */
class ProductsGallery extends Model
{
	protected $table = 'products_gallery';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int'
	];

	protected $fillable = [
		'product_id',
		'sm_url',
		'lg_url'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
