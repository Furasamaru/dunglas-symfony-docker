<?php

namespace App\Dto\City;

use phpDocumentor\Reflection\DocBlock\Description;
use Symfony\Component\Uid\Uuid;

final class CityListOutput
{
    public function __construct(
        #[ApiProperty(schema: [
            'type' => 'string',
            'format' => 'Uuid',
            'description' => 'Nom de la ville.'
        ])]
        public readonly Uuid $id,
        public readonly string $name,
    ) {
    }
}
