<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ProductsStatusEnum extends Enum {
    public const OPEN = 0;
    public const CLOSE = 1;
    public static function getStatusProduct(): array{
        return [
            'Mở'    =>  self::OPEN,
            'Đóng'  =>  self::CLOSE,
        ];
    }

}


