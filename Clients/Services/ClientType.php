<?php

namespace App\Clients\Services;

use Illuminate\Support\Collection;

/**
 * Class ClientType
 */
class ClientType
{
    const TYPE_CLIENTS = 1;
    const TYPE_CARRIERS = 2;
    const TYPE_FACTORIES = 3;
    const TYPE_SUPPLIERS = 4;
    const TYPE_LOCATIONS = 5;

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
