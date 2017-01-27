<?php //echo elgg_view('gamification_topbar'); ?>

<ul class="elgg-tabs elgg-htabs">
	<li class="elgg-state-selected"><a href="#tab-task-correction" rel="nofollow">Tu tarea</a></li>
	<li><a href="#tab-task-correcting" rel="nofollow">Corregir la tarea a un compañero</a></li>
</ul>

<script type="text/javascript"> 
	//Script para hacer que se auto-oculten las 
	$(function() {	
		var anchor = location.href.split('#')[1];
		if (anchor){
			anchor = "#" + anchor;
			$('.elgg-tabs li').removeClass('elgg-state-selected');
			$('.elgg-tabs a[href="' + anchor + '"]').parent().addClass('elgg-state-selected');
			console.log($('.tab-page').hide().filter(anchor).eq(0));
			$('.tab-page').hide().filter(anchor).show();
		}
		else
			$('.tab-page').hide().filter('.initial').show();
		
		$('.hide-on-click').live('click', function(){ $(this).hide(); }); 
		$('.tinymce-toggle-editor').each(function(i, target){
			var target = $(this).attr('href');
			var id = $(target).attr('id');
			
			setTimeout(function(){
				if (tinyMCE.get(id)) {
					tinyMCE.execCommand('mceRemoveControl', false, id);
					$(this).html(elgg.echo('tinymce:add'));
				}
			}, 1000);
		});

		$('.hint .close').click(function(){
			$(this).parent().fadeOut(500, function(){
				$(this).remove();
			});
		});
		
		$('.elgg-tabs li').click(function(e){
			e.preventDefault();
			var $this = $(this);
			if (!$this.hasClass('elgg-state-selected')){
				$('.tab-page').hide().filter($this.find('a').attr('href')).show();
				$('.elgg-tabs li').removeClass('elgg-state-selected');
				$this.addClass('elgg-state-selected');
			}
		});
	}); 
</script>

<div class="tab-page initial" id="tab-task-correction">
	<div class="override-lists">
	<div class="elgg-head clearfix"><h3>Enunciado</h3></div><br/>
	<?php
		//Vista para mostrar una tarea
		$parent_task = $vars['params']['parent_task'];
		$user_task = $vars['params']['task'];
		
		//Mostramos la descripción de la tarea
		echo $parent_task->description . '<br/>';
	?>
	</div>

	<? 
		echo '<div style="text-align:center;">';
		if (isset($vars['params']['initialFile'])){
			//Si la tarea contiene una plantilla inicial, mostramos el botón para descargarla
			if (!isset($vars['params']['admin_view']) || ($vars['params']['admin_view'] == false))
				echo '<a href="' . $vars['url'] .'file/download/' . $vars['params']['initialFile'] .'"  class="download-task-file download-initial">Descargar fichero inicial</a>';
		}
		
		if (isset($vars['params']['additionalFiles'])){
			//Si la tarea contiene una plantilla inicial, mostramos el botón para descargarla
			if (!isset($vars['params']['admin_view']) || ($vars['params']['admin_view'] == false))
				echo '<a href="' . $vars['url'] .'file/download/' . $vars['params']['additionalFiles'] .'"  class="download-task-file download-initial">Descargar ficheros auxiliares</a>';
		}
		
		if (isset($vars['params']['task']) && ($user_task->corrected == true)){
			//Si ya se ha realizado y corregido la tarea, mostramos el botón para descargarse la solución
			if (!isset($vars['params']['admin_view']) || ($vars['params']['admin_view'] == false))
				echo '<a href="' . $vars['url'] .'file/download/' . $vars['params']['solutionFile'] .'"  class="download-task-file download-solution">Descargar fichero de solución</a>';
		}
		echo '</div><br/>';
		
		if (!isset($vars['params']['task'])){
			//Si todavía no se ha realizado la tarea, mostramos el formulario para subir el archivo de solución
		?>
			<div class="hint">
				<div class="close"></div>
				Recuerda que la corrección de las tareas es anónima, por lo que no debes incluir en el archivo que subas como solución ningún tipo de información que revele tu identidad.<br/>
				<strong>Puntos por realizar esta tarea: <?php echo $parent_task->points_solve; ?></strong>
			</div>
		<?php
			echo elgg_view_form("gamification/tasks/solve", array('enctype' => 'multipart/form-data', 'class' => 'solve-form '), array('guid' =>  $parent_task->guid));
		}
		
		echo elgg_view('tasks/single/correction', array('params' => $vars['params']));
?>
</div>

<div class="tab-page" id="tab-task-correcting">
	<?php
		if (isset($vars['params']['task'])){
			//Se ha realizado la tarea, mostramos la sección de corrección
			if (isset($vars['params']['correcting'])){
				//Se ha solicitado una corrección
				if ($user_task->corrected == false){
					//Se ha solicitado corrección, pero todavía no se ha realizado
					//Mostramos el fichero y el formulario para realizar la corrección
				?>
					<div class="hint">
						<div class="close"></div>
						Te ha sido asignada una tarea para corregir. La corrección es anónima, por lo que no sabrás a quién se la has corregido hasta después de haber tomado tu decisión sobre si la tarea
						está bien o mal. Para corregirla, descárgate el fichero que ha subido el compañero y completa el formulario según creas que se cumple o no cada criterio.<br/>
						<strong>Puntos por corregir esta tarea: <?php echo $parent_task->points_correction; ?></strong>
					</div>
					<div style="text-align:center">
						<a href="<?php echo $vars['url']; ?>file/download/<?php echo $vars['params']['correctingFile']; ?>"  class="download-task-file download-solution">Descargar práctica a corregir</a>
					</div><br/>
				<?php
					echo elgg_view_form("gamification/tasks/post_correction", 
												array('class' => 'post-correction-form'), 
												array('parent_task' => $parent_task, 'guid' => $user_task->guid, 'correcting' => $vars['params']['correcting']->guid, 'new_correction' => 'true'));
				}
				else {
					//Se ha realizado la correcion, mostramos el fichero, el resultado y la discusion
				?>	
					<div class="hint">
						<div class="close"></div>
						Una vez has realizado una corrección, queda esta sección abierta para poder discutir con tu compañero sobre el resultado de la misma, ya que puede no estar de acuerdo con tu decisión. Puedes añadir comentarios mediante el botón correspondiente, así como cambiar la corrección de la misma en cualquier momento.<br/>
					</div>
					<div style="text-align:center">
						<a href="<?php echo $vars['url']; ?>file/download/<?php echo $vars['params']['correctingFile']; ?>"  class="download-task-file download-solution">Descargar práctica a corregir</a>
					</div><br/>
				<?php
					echo elgg_view('tasks/single/peer-correction', array('params' => $vars['params']));
				}
			}
			else { 
				//Todavía no se ha solicitado corrección, mostramos el formulario para solicitarla
			?>
				<div class="hint">
					<div class="close"></div>
					Cuando ya has realizado una tarea, puedes corregir la misma a otro compañero para conseguir puntos. Antes de corregirla hay que solicitar la corrección para que te sea asignada de forma aleatoria la tarea de otro alumno (anónimo). Para solicitarla, pulsa el siguiente botón<br/>
					<strong>Puntos por corregir esta tarea: <?php echo $parent_task->points_correction; ?></strong>
				</div>
			<?php
				echo elgg_view_form("gamification/tasks/request_correction", array('class' => 'inline-form'), array('parent_guid' => $parent_task->guid, 'guid' => $user_task->guid));
			}
		}
		else{ ?>
			<div class="hint">
				Una vez hayas subido tu solución para una tarea, podrás realizar la corrección de la misma a otro compañero. <br/>
				<strong>Puntos por corregir esta tarea: <?php echo $parent_task->points_correction; ?></strong>
			</div>
	<?php
		}	
	?>
</div>
<br/><br/>

<?php if ( elgg_is_admin_logged_in() ){
		//Mostramos el botón para volver a la lista de tareas
		if (isset($vars['params']['admin_view']) && ($vars['params']['admin_view'] == true)){
			echo elgg_view('output/url', array('text' => "Volver", 'href' => "gamification/tasks/admin", 'class' => 'elgg-button elgg-button-action')) . "  ";
			echo  '<div style="display:inline-block;">' . elgg_view_form("gamification/tasks/delete_user", array(), array('guid' => $vars['params']['task']->guid))  . '</div>';
		}
		else{
			echo elgg_view('output/url', array('text' => "Volver", 'href' => "gamification/tasks", 'class' => 'elgg-button elgg-button-action')) . "  ";
			echo '<div style="display:inline-block;">' . elgg_view_form("gamification/tasks/delete", array(), array('guid' => $parent_task->guid)) . '</div>';
		}
			//Si estamos conectados como administrador, mostramos el botón para eliminar la tarea
		
		if ($parent_task->visible == false) echo '<div style="display:inline-block;">' . elgg_view_form("gamification/tasks/publish", array(), array('guid' => $parent_task->guid)) . '</div>';
		if (isset($vars['params']['task'])){
			if ($vars['params']['task']->correction_asked){
				echo  '<div style="display:inline-block;">' . elgg_view_form("gamification/tasks/deassign_correction", array(), array('guid' => $vars['params']['task']->guid)) . '</div>';
			}
		}
	}
	else{
		//Mostramos el botón para volver a la lista de tareas
		echo elgg_view('output/url', array('text' => "Volver", 'href' => "gamification/tasks", 'class' => 'elgg-button elgg-button-action')) . "  ";
	}
 ?>

