<?php

namespace App\Traits;

use App\HashidOptions;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

trait HasHashid
{
    abstract public function getHashidOptions(): HashidOptions;

    protected static function bootHasHashid(): void
    {
        static::created(
            fn (Model $model) => $model->generateHashid()
        );
    }

    protected function generateHashid(): void
    {
        $options = $this->getHashidOptions();

        $this->hashid = Hashids::connection($options->connection)
            ->encode($options->fields);

        $this->saveQuietly();
    }

    public function getRouteKeyName(): string
    {
        return 'hashid';
    }
}
