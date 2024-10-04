<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 *
 * @property $id
 * @property $first_name
 * @property $last_name
 * @property $age
 * @property $gender
 * @property $email
 * @property $country
 * @property $city
 * @property $picture_large
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['first_name', 'last_name', 'age', 'gender', 'email', 'country', 'city', 'picture_large'];


}
