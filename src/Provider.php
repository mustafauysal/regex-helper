<?php
namespace RegexHelper;


class Provider
{


    public $url;

    public function setUrl( $url )
    {
        $this->url = $url;
    }

    public function get( $param )
    {
        if ( ! method_exists( $this, $param )) {
            throw new NotFoundException();
        }


        return call_user_func_array( array( $this, $param ), func_get_args() );

    }

}