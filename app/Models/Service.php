<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $icon
 *
 * @package App\Models
 */
class Service extends Model
{
    protected $table = 'services';
    public $timestamps = false;

    protected $fillable = [
        'name_en',
        'name_ar',
        'icon'
    ];

//    public function icon()
//    {
//        return $this->icon != "" ? asset('storage/' . $this->icon) : url('public/dist/assets/img/empty.jpg');
//    }

}
