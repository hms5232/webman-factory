<?php

return [
    'enable' => true,

    /*
     * The path to the directory of factories.
     */
    'factory_path' => getenv('FACTORY_PATH') ?: 'database/factories',

    /*
     * The path to the directory of models.
     */
    'model_path' => getenv('MODEL_PATH') ?: 'app/model',
];
