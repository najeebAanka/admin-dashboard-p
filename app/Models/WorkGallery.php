<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkGallery
 * 
 * @property int $id
 * @property int|null $media_type
 * @property string|null $media_url_thumb
 * @property string|null $media_url_original
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $work_id
 * 
 * @property Work|null $work
 *
 * @package App\Models
 */
class WorkGallery extends Model
{
	protected $table = 'work_gallery';

	protected $casts = [
		'media_type' => 'int',
		'work_id' => 'int'
	];

	protected $fillable = [
		'media_type',
		'media_url_thumb',
		'media_url_original',
		'work_id'
	];

	public function work()
	{
		return $this->belongsTo(Work::class);
	}
}
