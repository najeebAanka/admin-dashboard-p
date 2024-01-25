<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Faq
 * 
 * @property int $id
 * @property string|null $q_en
 * @property string|null $q_ar
 * @property string|null $a_en
 * @property string|null $a_ar
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Faq extends Model
{
	protected $table = 'faqs';

	protected $fillable = [
		'q_en',
		'q_ar',
		'a_en',
		'a_ar'
	];
}
