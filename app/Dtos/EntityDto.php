<?php

namespace App\Dtos;

use App\Enums\CategoryEnum;

class EntityDto
{
    /**
     * Construct
     *
     * @return void
     */
    public function __construct(
        public string $api,
        public string $description,
        public string $link,
        public ?CategoryEnum $category,
    ) {
        //
    }
}
