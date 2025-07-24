<?php

namespace Hms5232\WebmanFactory;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Wrapped factory for webman framework.
 */
abstract class WebmanFactory extends Factory
{
    /**
     * @var \Faker\Generator
     */
    protected $faker;

    public function __construct()
    {
        parent::__construct();
        $this->faker = \Faker\Factory::create();
    }
}
