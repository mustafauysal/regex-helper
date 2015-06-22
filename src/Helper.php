<?php
namespace RegexHelper;

use RegexHelper\Providers\Youtube;

class Helper
{


    public static function getYoutube( $url, $param = 'id' )
    {

        $provider = new Youtube();
        $provider->setUrl( $url );

        return $provider->get( $param );
    }


}