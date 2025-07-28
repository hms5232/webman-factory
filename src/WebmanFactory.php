<?php

namespace Hms5232\WebmanFactory;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Wrapped factory for webman framework.
 */
abstract class WebmanFactory extends Factory
{
    /**
     * @inheritDoc
     */
    protected function withFaker()
    {
        return \Faker\Factory::create();
    }
}
