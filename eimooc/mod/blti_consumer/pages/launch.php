<?php

// Make sure we're logged in (send us to the front page if not)
//vjr gatekeeper();

if (!elgg_is_logged_in()) {  //vjr
        $_SESSION['last_forward_from']=current_page_url();
//      register_error(elgg_echo('loggedinrequired'));
        //forward('http://eco.imooc.uab.pt/elgg/login');
///        echo '<table width="100%" border="0"><tr><td align="center"><iframe src="http://eco.imooc.uab.pt/elgg/mod/social_connect/authenticate.php?provider=Eco" name="social_connect_sign_on" width="800" height="600" frameborder="0"></iframe></td></tr></table>';
        echo '<table width="100%" border="0"><tr><td align="center"><iframe name="social_connect_sign_on" width="800" height="600" frameborder="0"></iframe></td></tr></table>
              <script type="text/javascript">
window.open("http://eco.imooc.uab.pt/elgg/mod/social_connect/authenticate.php?provider=Eco", "social_connect_sign_on", "location=1,status=0,scrollbars=0,width=800,height=600");
</script>';
} else {

// Get input data
$guid = (int) get_input('guid', -1);
$consumEnt = get_entity($guid);

if ($guid>0 && $consumEnt) {

	$content = blti_consumer_launch($consumEnt);
				  
	// format
	$layout = ""; //"two_column_left_sidebar";
	$body = elgg_view_layout($layout, array(
		'filter_context' => 'listing',
		'content' => $content,
	));
	
	// Draw page
	echo elgg_view_page($consumEnt->name, $body);
	
} else {
	register_error('Unknow tool blti '.$guid);
	forward($_SERVER['HTTP_REFERER']);
}
}

?>
