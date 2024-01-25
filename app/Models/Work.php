<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Work
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property Carbon|null $date_released
 * @property string|null $description_en
 * @property string|null $description_ar
 * @property string|null $icon
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $category_id
 *
 * @property PortfolioCategory|null $portfolio_category
 * @property Collection|WorkGallery[] $work_galleries
 *
 * @package App\Models
 */
class Work extends Model
{
    protected $table = 'works';

    protected $casts = [
        'category_id' => 'int'
    ];

    protected $dates = [
        'date_released'
    ];

    protected $fillable = [
        'name_en',
        'name_ar',
        'date_released',
        'description_en',
        'description_ar',
        'icon',
        'category_id'
    ];

    public function portfolio_category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'category_id');
    }

    public function work_galleries()
    {
        return $this->hasMany(WorkGallery::class);
    }


//    public function getIconAttribute()
//    {
//        try {
//            return $this->icon != "" ? asset('storage/' . $this->icon) : url('public/dist/assets/img/empty.jpg');
//        } catch (\Exception $ex) {
//
//        }
//        return url('public/dist/assets/img/empty.jpg');
//    }
}
