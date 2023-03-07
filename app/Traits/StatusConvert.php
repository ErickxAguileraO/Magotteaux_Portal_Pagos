<?php

namespace App\Traits;


trait StatusConvert
{
    public function getEstado()
    {
        return $this->getAttribute($this->prefix . '_estado') == 0 ? 'Inactivo' : 'Activo';
    }
}
