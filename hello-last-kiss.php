<?php
/*
Plugin Name: Hello Last Kiss
Description: Sick of Hello Dolly, or maybe it's your fav.  Either way this does the same thing, just with Last Kiss. Sign it in your head, the original Wayne Cochran version or Pearl Jam's - up to you!
Hello Dolly Author: Matt Mullenweg
Author: dan-gaia
Version: 1
Hello Dolly Author URI: http://ma.tt/
Author URI: http://gaiarendering.com
*/

function hello_last_kiss_get_lyric() {
	/** These are the lyrics to Hello last_kiss */
	$lyrics = "Where, oh where, can my baby be?
	the lord took her away from Me.
	she's gone to heaven, so Ive got to be good.
	so I can see my baby when i Leave this world.
	We were out on a date in my daddys car.
	we hadnt driven very far.
	there in The road, straight ahead. a car was stalled, the engine was dead.
	I couldnt stop, so I swerved to the right.
	I'll never forget the sound that Night.
	the screamin tires, the bustin glass.
	the painful scream that I heard Last.
	Oh where, oh where, can my baby be?
	the lord took her away from me.
	she's gone To heaven, so Ive got to be good.
	so I can see my baby when I leave this world.
	When I woke up the rain was pourin down.
	there were people standin all around.
	Something warm flowing through my eyes.
	but somehow I found my baby that night.
	I lifted her head, she looked at me and said.
	hold me darling, just a little While.
	I held her close, I kissed her our last kiss.
	I found the love that i Knew I had missed.
	Well now she's gone. even though I hold her tight.
	I lost my love, my life, That night.
	Oh where, oh where, can my baby be?
	the lord took her away from me.
	she's gone To heaven, so Ive got to be good.
	so I can see my baby when I leave this World.";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_last_kiss() {
	$chosen = hello_last_kiss_get_lyric();
	echo "<p id='last_kiss'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_last_kiss' );

// We need some CSS to position the paragraph
function last_kiss_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#last_kiss {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'last_kiss_css' );

?>
