<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PricingPackage
 * 
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $subtitle_en
 * @property string|null $subtitle_ar
 * @property string|null $old_price
 * @property string|null $new_price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|PackageServicesLink[] $package_services_links
 *
 * @package App\Models
 */
class PricingPackage extends Model
{
	protected $table = 'pricing_packages';

	protected $fillable = [
		'name_en',
		'name_ar',
		'subtitle_en',
		'subtitle_ar',
		'old_price',
		'new_price'
	];

	public function package_services_links()
	{
		return $this->hasMany(PackageServicesLink::class, 'pricing_package_id');
	}
}
