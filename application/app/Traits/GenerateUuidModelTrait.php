<?php

namespace App\Traits;

trait GenerateUuidModelTrait
{
    use GenerateUuidTrait;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = self::generateUuid();
        });
    }
}
