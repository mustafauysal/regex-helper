<?php
use RegexHelper\Helper;


class HelperTests extends \PHPUnit_Framework_TestCase{


    /**
     * @dataProvider youtubeUrl
     */
    public function testYoutube( $url, $type, $result )
    {
        $this->assertEquals( Helper::getYoutube( $url,$type), $result );
    }

    public function youtubeUrl()
    {
        return array(
            array( "https://www.youtube.com/watch?v=RgKAFK5djSk", "id", "RgKAFK5djSk" ),
            array( "https://youtu.be/RgKAFK5djSk?t=13s", "id","RgKAFK5djSk" ),
            array( "https://youtu.be/RgKAFK5djSk?t=13s","time", "13s" ),
            array( "https://www.youtube.com/watch?v=RgKAFK5djSk&feature=youtu.be&t=40s","time", "40s" ),
        );
    }


    /**
     * @param $url
     * @param $type
     * @param $result
     *
     * @dataProvider vimeourl
     */
    public function testVimeo($url,$type,$result){
        $this->assertEquals( Helper::getVimeo( $url,$type), $result );
    }


    public function vimeoUrl(){
        return array(
            array('https://vimeo.com/86063518','id','86063518'),
            array('https://vimeo.com/29658185','id','29658185'),
            array('https://vimeo.com/channels/staffpicks/65843745','id','65843745'),
        );
    }

}