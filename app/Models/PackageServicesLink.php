<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PackageServicesLink
 * 
 * @property int $id
 * @property int|null $package_id
 * @property int|null $service_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property PackageService|null $package_service
 * @property PricingPackage|null $pricing_package
 *
 * @package App\Models
 */
class PackageServicesLink extends Model
{
	protected $table = 'package_services_links';

	protected $casts = [
		'pricing_package_id' => 'int',
		'service_id' => 'int'
	];

	protected $fillable = [
		'pricing_package_id',
		'service_id'
	];

	public function package_service()
	{
		return $this->belongsTo(PackageService::class, 'service_id');
	}

	public function pricing_package()
	{
		return $this->belongsTo(PricingPackage::class, 'pricing_package_id');
	}
}
