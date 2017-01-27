Acabas de conseguir un logro!<br/>
<div>
<img style="float:left;" src="<?php echo $vars["achievement"]->getIconURL(); ?>" />
<pre style="float:left; background:#fff;"> 
<br/><br/><br/>
</pre>
<h2><?php echo $vars["achievement"]->title; ?></h2>
<h3 style="color:#000;"><?php echo $vars["achievement"]->description; ?></h3>

<br/>
Puedes ir a la <a href="<?php echo $vars['url'] ?>gamification/achievements"> lista de logros</a> para comprobar los que ya has conseguido hasta el momento.
</div>