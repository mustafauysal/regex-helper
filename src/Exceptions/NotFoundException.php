<?php

namespace RegexHelper\Exceptions;

class NotFoundException extends \Exception{

    public function __construct( $message = null, $code = 0 )
    {
        if ( ! $message) {
            throw new $this( 'This property not found in '.get_class( $this ) );
        }
        parent::__construct( $message, $code );
    }

    public function __toString()
    {
        return get_class( $this )." '{$this->message}' in {$this->file}({$this->line})\n"
               ."{$this->getTraceAsString()}";
    }

}