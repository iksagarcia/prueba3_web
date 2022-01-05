<?php 
class Validators {
    static function string($input_string){
        $input_string = trim($input_string);
        if (empty($input_string)){
            return false;
        }
        if (preg_match("/\d+/i",$input_string)){
            return false;
        }
        if (strlen($input_string)>200){
            return false;
        }
        return true; 
    }
    static function number($input_number){
        $input_number = trim($input_number);
        if (empty($input_number)){
            return false;
        }
        if (!preg_match("/^\d+$/i",$input_number)){
            return false;
        }
        if (strlen($input_number)>200){
            return false;
        }
        return true; 
    }
    
    static function rut($input_rut){
        return self::number($input_rut);
    }
    static function nombre($input_nombre){
        return self::string($input_nombre);
    }
    static function apellido($input_apellido){
        return self::string($input_apellido);
    }
    static function valor_factura($input_valor_factura){
        return self::number($input_valor_factura);
    }
    static function metodo_pago($input_metodo_pago){
        return self::string($input_metodo_pago);
    }
}
