<?php
use RegexHelper\Helper;


class HelperTests extends \PHPUnit_Framework_TestCase{


    /**
     * @dataProvider youtubeurl
     */
    public function testYoutube( $url, $type, $result )
    {
        $this->assertEquals( Helper::getYoutube( $url,$type), $result );
    }

    public function youtubeurl()
    {
        return array(
            array( "https://www.youtube.com/watch?v=RgKAFK5djSk", "id", "RgKAFK5djSk" ),
            array( "https://youtu.be/RgKAFK5djSk?t=13s", "id","RgKAFK5djSk" ),
            array( "https://youtu.be/RgKAFK5djSk?t=13s","time", "13s" ),
            array( "https://www.youtube.com/watch?v=RgKAFK5djSk&feature=youtu.be&t=40s","time", "40s" ),
        );
    }



}