<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class CategoriesStatusEnum extends Enum
{
    public const OPEN = 0;
    public const BLOCK = 1;
}
