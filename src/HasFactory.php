<?php

namespace Hms5232\WebmanFactory;

use Illuminate\Database\Eloquent\Factories\HasFactory as IlluminateHasFactory;

/**
 * @template TFactory of \Illuminate\Database\Eloquent\Factories\Factory
 */
trait HasFactory
{
    use IlluminateHasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return TFactory|null
     */
    protected static function newFactory()
    {
        if (isset(static::$factory)) {
            return static::$factory::new();
        }

        // factory for webman namespace style
        $factoryPath = config('plugin.hms5232.webman-factory.factory_path', 'database/factories');
        $modelPath = config('plugin.hms5232.webman-factory.model_path', 'app/model');
        $modelName = str_replace('/', '\\', $modelPath);
        $class = str_replace('/', '\\', $factoryPath) . str_replace($modelName, '', static::class) . 'Factory';
        if (class_exists($class)) {
            return $class::new();
        }

        return static::getUseFactoryAttribute() ?? null;
    }
}
