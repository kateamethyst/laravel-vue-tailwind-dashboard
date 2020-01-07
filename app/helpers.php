<?php

use Illuminate\Database\Eloquent\Model;

function getModelName(Model $model)
{
    if (!($model) instanceof Model) {
        throw new RuntimeException('Provided parementer is not modele '. get_class($model));
    }

    $modelPath = explode('\\', get_class($model), 3);

    return str_replace('\\', ' ', $modelPath[2]);
}