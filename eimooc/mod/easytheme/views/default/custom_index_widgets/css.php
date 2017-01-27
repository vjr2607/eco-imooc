<?php
/**
 * Custom Index CSS
 *
 */
$etmod = elgg_get_plugin_setting('etmod','easytheme');
?>

/*******************************
	Custom Index
********************************/

.custom-index {
	padding: 20px;
}

.index_mode {
	margin-top: 20px;
	margin-left: 5px;
	border-spacing: 15px;
	width: 97.3%;
}

.index_mode td {
	padding-left: 15px;
}

.elgg-module-featured {
	border: 1px solid <?php echo $etmod; ?>;
        -webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;
}

.elgg-module-featured  .elgg-head {
	padding: 5px;
	background-color: #FFFFFF; //<?php echo $etmod; ?>;
	background-image: url('<?php echo $vars["url"]; ?>mod/easytheme/graphics/box_head.png')
}

.custom-index .elgg-content {
	//width: 400px;  //vjr

}

.et-module-message {	
	border: 1px solid <?php echo $etmod; ?>;
	padding: 15px;
	margin-bottom: 20px;
	min-height: 260px;
        height: auto !important; 
        height: 260px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
	
}

.et-module-message h3{
	margin-bottom: 15px;
}

.et-module-message h2{
	margin-bottom: 12px;
}

.custom-index .elgg-gallery{
	margin-top: 10px;
	margin-left: 8px;

}


.custom-index .elgg-form {
	padding-top: 30px;
	padding-left: 30px;
	width: 300px;
}

.elgg-module-featured > .elgg-body{
        padding-left: 15px;
	padding-right: 15px;
        padding-bottom: 5px;       
       
}

.elgg-module-featured > .elgg-body h3{
	color: #fff;	
	}

.elgg-module-featured > .elgg-body h2 {
	padding: 10px;
	padding-bottom: 0px;
}

.custom-index .elgg-list {
	padding: 10px;
}
