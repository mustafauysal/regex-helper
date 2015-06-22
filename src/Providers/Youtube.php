<?php

namespace RegexHelper\Providers;

use RegexHelper\Exceptions\NotFoundException;

class Youtube
{

    private $url;

    public function setUrl( $url )
    {
        $this->url = $url;
    }

    public function get( $param )
    {
        if ( ! method_exists( $this, $param )) {
            throw new NotFoundException();
        }

        return $this->$param();

    }

    /**
     * Fetch video id from youtube url
     * @return mixed
     */
    private function id()
    {
        /**
         * @see  http://stackoverflow.com/a/5831191/1942303
         */
        preg_match( '~https?://
        (?:[0-9A-Z-]+\.)? # Optional subdomain.
        (?:               # Group host alternatives.
          youtu\.be/      # Either youtu.be,
        | youtube         # or youtube.com or
          (?:-nocookie)?  # youtube-nocookie.com
          \.com           # followed by
          \S*             # Allow anything up to VIDEO_ID,
          [^\w\s-]       # but char before ID is non-ID char.
        )                 # End host alternatives.
        ([\w-]{11})      # $1: VIDEO_ID is exactly 11 chars.
        (?=[^\w-]|$)     # Assert next char is non-ID or EOS.
        (?!               # Assert URL is not pre-linked.
          [?=&+%\w.-]*    # Allow URL (query) remainder.
          (?:             # Group pre-linked alternatives.
            [\'"][^<>]*>  # Either inside a start tag,
          | </a>          # or inside <a> element text contents.
          )               # End recognized pre-linked alts.
        )                 # End negative lookahead assertion.
        [?=&+%\w.-]*        # Consume any URL (query) remainder.
        ~ix', $this->url, $matches );

        return $matches[1];
    }


    /**
     * Fetch time value from youtube url
     * @return mixed
     */
    private function time()
    {

        preg_match( '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[a-z0-9;:@#?&%=+\/\$_.-]*(t=((\d+h)?(\d+m)?(\d+s)?))~i', $this->url, $matches );

        return $matches[3];
    }


}