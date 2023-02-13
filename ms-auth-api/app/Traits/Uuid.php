<?php
/**
 * Traits for generating uuid.
 *
 * @author seniordev@ovmyanmar.com
 * Created On: 04/04/2022
 */


namespace App\Traits;

trait Uuid
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = str_replace('-','', \Ramsey\Uuid\Uuid::uuid4());
        });
    }
}

