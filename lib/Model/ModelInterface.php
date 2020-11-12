<?php

namespace RCCFSPLD\Simulacion\MX\Client\Model;

interface ModelInterface
{
    
    public function getModelName();
    
    public static function RCCFSPLDTypes();
    
    public static function RCCFSPLDFormats();
    
    public static function attributeMap();
    
    public static function setters();
    
    public static function getters();
    
    public function listInvalidProperties();
    
    public function valid();
}
