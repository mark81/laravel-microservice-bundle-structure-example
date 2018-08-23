<?php

namespace App\Clients\Services;

use Illuminate\Support\Collection;

/**
 * Class ClientType
 */
class ClientType
{
    const TYPE_1 = 1;
    const TYPE_2 = 2;

    /**
     * Check type of client
     *
     * @param int $type
     * @throws InvalidArgumentException if it is invalid type
     */
    public static function validateType(int $type)
    {
        $refl = new \ReflectionClass(self::class);
        if (!in_array($status, $refl->getConstants())) {
            throw new \InvalidArgumentException('Does not support this type');
        }
    }

    /**
     * Get supported types
     *
     * @return Collection
     */
    public static function getTypes(): Collection
    {
        $refl = new \ReflectionClass(self::class);
        return new Collection($refl->getConstants());
    }
}
