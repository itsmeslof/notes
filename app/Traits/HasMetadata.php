<?php

namespace App\Traits;

trait HasMetadata
{
    public function mergeMetadata(array ...$arrays): array
    {
        return array_merge(
            $this->getDefaultMetadata(),
            ...$arrays
        );
    }

    abstract protected function getDefaultMetadata(): array;
}
