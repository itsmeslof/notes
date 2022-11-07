<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

trait HasHashID
{
    abstract public function generateHashIDFromFields(): array;

    protected static function bootHasHashID(): void
    {
        static::created(
            fn (Model $model) => $model->generateHashID()
        );
    }

    protected function generateHashID(): void
    {
        $this->hashid = Hashids::encode($this->generateHashIDFromFields());
        $this->saveQuietly();
    }

    public function getRouteKeyName()
    {
        return 'hashid';
    }
}
