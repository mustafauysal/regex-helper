<?php
namespace RegexHelper;

use RegexHelper\Providers\Vimeo;
use RegexHelper\Providers\Youtube;

class Helper
{


    public static function getYoutube( $url, $param = 'id' )
    {

        $provider = new Youtube();
        $provider->setUrl( $url );

        return $provider->get( $param );
    }


    public static function getVimeo( $url, $param = 'id' )
    {
        $provider = new Vimeo();
        $provider->setUrl( $url );

        return $provider->get( $param );
    }

}