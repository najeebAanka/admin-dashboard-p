<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Testimonial
 * 
 * @property int $id
 * @property string|null $icon
 * @property string|null $text
 * @property string|null $rating
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Testimonial extends Model
{
	protected $table = 'testimonials';

	protected $fillable = [
		'icon',
		'text',
		'rating'
	];
}
