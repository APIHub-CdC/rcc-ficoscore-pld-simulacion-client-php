<?php

namespace RCCFSPLD\Simulacion\MX\Client\Model;
use \RCCFSPLD\Simulacion\MX\Client\ObjectSerializer;

class CatalogoSexo
{
    
    const F = 'F';
    const M = 'M';
    
    
    public static function getAllowableEnumValues()
    {
        return [
            self::F,
            self::M,
        ];
    }
}
