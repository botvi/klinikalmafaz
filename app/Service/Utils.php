<?php

namespace App\Service;

class Utils
{

    public function save($model, $data)
    {
        $model->fill($data);
        $model->save();
        return $model;
    }
}
