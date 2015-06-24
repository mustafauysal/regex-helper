<?php
namespace RegexHelper\Providers;

use RegexHelper\Exceptions\NotFoundException;
use RegexHelper\Provider;

class Vimeo extends Provider
{

    /**
     * Fetch video id from vimeo url
     * @return mixed
     */
    public function id()
    {
        $pattern = '/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/';
        preg_match( $pattern, $this->url, $matches );

        return $matches[5];
    }


}