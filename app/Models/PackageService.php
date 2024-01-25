<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PackageService
 * 
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|PackageServicesLink[] $package_services_links
 *
 * @package App\Models
 */
class PackageService extends Model
{
	protected $table = 'package_services';

	protected $fillable = [
		'name_en',
		'name_ar'
	];

	public function package_services_links()
	{
		return $this->hasMany(PackageServicesLink::class, 'service_id');
	}
}
