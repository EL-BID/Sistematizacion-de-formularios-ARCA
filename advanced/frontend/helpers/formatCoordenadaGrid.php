<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\helpers;

/**
 * Description of formatCoordenadaGrid
 *
 * @author ANAID
 */
class formatCoordenadaGrid extends \yii\i18n\Formatter
{
    public function asCoordenada($value)
    {
        return ($value + 0);
    }
}
