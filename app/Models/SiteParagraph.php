<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SiteParagraph
 * 
 * @property int $id
 * @property string|null $code
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $content_en
 * @property string|null $content_ar
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class SiteParagraph extends Model
{
	protected $table = 'site_paragraphs';

	protected $fillable = [
		'code',
		'name_en',
		'name_ar',
		'content_en',
		'content_ar'
	];
}
