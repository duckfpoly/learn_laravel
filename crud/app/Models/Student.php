<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birthday',
    ];

    protected function nameStudent(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) =>  $attributes['first_name']. ' ' . $attributes['last_name'],
        );
    }
    protected function ageStudent(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                $date = new DateTime($attributes['birthday']);
                $now = new DateTime();
                return $now->diff($date)->y;
            },
        );
    }
    protected function genderStudent(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return ($attributes['gender']) === 0 ? 'Male' : 'Female';
            },
        );
    }

}
