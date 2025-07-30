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

    /**
     * @inheritDoc
     */
    protected static function appNamespace()
    {
        // In webman, just get the namespace of model dir
        return str_replace('/', '\\', config('plugin.hms5232.webman-factory.model_path', 'app/model')) . '\\';
    }
}
