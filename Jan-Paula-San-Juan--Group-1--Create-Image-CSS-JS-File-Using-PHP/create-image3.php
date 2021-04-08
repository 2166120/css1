<?php
	function random_captcha()
    {
        $letters = array( 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9' );
        $word = '';  //this is what we'll return!
        for($i = 0; $i < 6; $i++) 
        {
            $x = floor(rand(0, count($letters) - 1));
			$word = $word . $letters[$x]; 
        }
		return $word;
    }

	$my_img = imagecreate( 200, 80 );
	$background = imagecolorallocate( $my_img, rand(0, 255), rand(0, 255), rand(0, 255));
	$text_colour = imagecolorallocate( $my_img, rand(0, 255), rand(0, 255), rand(0, 255));
	imagestring( $my_img, 4, 30, 25, random_captcha(), $text_colour );
	imagesetthickness ( $my_img, 5 );

	header( "Content-type: image/png" );
	imagepng( $my_img );
	imagecolordeallocate( $text_color );
	imagecolordeallocate( $background );
	imagedestroy( $my_img );
?>