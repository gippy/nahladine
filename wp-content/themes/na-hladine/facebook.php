<?php
require_once("lib/facebook/facebook.php");

function autolink( &$text, $target='_blank', $nofollow=true )
{
	// grab anything that looks like a URL...
	$urls  =  _autolink_find_URLS( $text );
	if( !empty($urls) ) // i.e. there were some URLS found in the text
	{
		array_walk( $urls, '_autolink_create_html_tags', array('target'=>$target, 'nofollow'=>$nofollow) );
		$text  =  strtr( $text, $urls );
	}
}

function _autolink_find_URLS( $text )
{
	// build the patterns
	$scheme         =       '(http:\/\/|https:\/\/)';
	$www            =       'www\.';
	$ip             =       '\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}';
	$subdomain      =       '[-a-z0-9_]+\.';
	$name           =       '[a-z][-a-z0-9]+\.';
	$tld            =       '[a-z]+(\.[a-z]{2,2})?';
	$the_rest       =       '\/?[a-z0-9._\/~#&=;%+?-]+[a-z0-9\/#=?]{1,1}';
	$pattern        =       "$scheme?(?(1)($ip|($subdomain)?$name$tld)|($www$name$tld))$the_rest";

	$pattern        =       '/'.$pattern.'/is';
	$c              =       preg_match_all( $pattern, $text, $m );
	unset( $text, $scheme, $www, $ip, $subdomain, $name, $tld, $the_rest, $pattern );
	if( $c )
	{
		return( array_flip($m[0]) );
	}
	return( array() );
}

function _autolink_create_html_tags( &$value, $key, $other=null )
{
	$target = $nofollow = null;
	if( is_array($other) )
	{
		$target      =  ( $other['target']   ? " target=\"$other[target]\"" : null );
		// see: http://www.google.com/googleblog/2005/01/preventing-comment-spam.html
		$nofollow    =  ( $other['nofollow'] ? ' rel="nofollow"'            : null );
	}
	$value = "<a href=\"$key\"$target$nofollow>$key</a>";
}

$config = array();
$config['appId'] = '478034385602193';
$config['secret'] = 'c64f9779a8ae06ba9f422a248549587d';
$config['fileUpload'] = false; // optional

$facebook = new Facebook($config);
$feed = $facebook->api('/famufest/feed?limit=10','GET');
$news = $feed['data'];
?>
<h2>fb</h2>
<?php
foreach ($news as $newsItem){
	if (@$newsItem['message'] == '') continue;
?>
<article class="fb-item">
	<?php
		$date = new DateTime( $newsItem['created_time'] );
	?>
	<p class="date"><?php echo $date->format('j|n|Y'); ?></p>
	<?php
		$itemRows = explode("\n",$newsItem['message']);
		foreach($itemRows as $row){
			autolink($row)
	?>
	<p><?php echo $row; ?></p>
	<?php } ?>
</article>
<?php
}
?>