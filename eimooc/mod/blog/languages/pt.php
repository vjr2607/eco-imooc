<?php
/**
 * Blog Portuguese language file.
 *
 */

$portugues = array(
	'blog' => 'Blog',
	'blog:blogs' => 'Blogs',
	'blog:revisions' => 'Revisões',
	'blog:archives' => 'Arquivos',
	'blog:blog' => 'Blog',
	'item:object:blog' => 'Blogs',

	'blog:title:user_blogs' => 'Os blogs de %s',
	'blog:title:all_blogs' => 'Todos os blogs do sítio',
	'blog:title:friends' => 'Blogs dos amigos',

	'blog:group' => 'Blog do grupo',
	'blog:enableblog' => 'Ativar blog do grupo',
	'blog:write' => 'Escrever uma entrada do blog',

	// Editing
	'blog:add' => 'Adicionar entrada no blog',
	'blog:edit' => 'Modificar entrada do blog',
	'blog:excerpt' => 'Excerto',
	'blog:body' => 'Corpo',
	'blog:save_status' => 'Gravado pela última vez: ',
	'blog:never' => 'Nunca',

	// Statuses
	'blog:status' => 'Estado',
	'blog:status:draft' => 'Rascunho',
	'blog:status:published' => 'Publicado',
	'blog:status:unsaved_draft' => 'Rascunho não gravado',

	'blog:revision' => 'Revisão',
	'blog:auto_saved_revision' => 'Revisão gravada automaticamente',

	// messages
	'blog:message:saved' => 'Entrada do blog gravada.',
	'blog:error:cannot_save' => 'Não é possível gravar a entrada do blog.',
	'blog:error:cannot_write_to_container' => 'Permissões insuficientes para gravar o blog no grupo.',
	'blog:error:post_not_found' => 'Esta entrada foi removida, é inválida, ou não tem permissão para a visualizar.',
	'blog:messages:warning:draft' => 'Há um rascunho não gravado desta entrada!',
	'blog:edit_revision_notice' => '(Versão antiga)',
	'blog:message:deleted_post' => 'Entrada do blog eliminada.',
	'blog:error:cannot_delete_post' => 'Não é possível eliminar entrada do blog.',
	'blog:none' => 'Sem entradas no blog',
	'blog:error:missing:title' => 'Por favor especifique o título da entrada!',
	'blog:error:missing:description' => 'Por favor insira texto no corpo da entrada!',
	'blog:error:cannot_edit_post' => 'Esta entrada pode não existir ou não tem permissões para a alterar.',
	'blog:error:revision_not_found' => 'Não foi possível encontrar esta revisão.',

	// river
	'river:create:object:blog' => "%s publicou uma entrada no blog %s",
	'river:comment:object:blog' => '%s comentou no blog %s',

	// widget
	'blog:widget:description' => 'Mostrar as entradas recentes do blog',
	'blog:moreblogs' => 'Mais entradas do blog',
	'blog:numbertodisplay' => 'Número de entradas do blog a mostrar',
	'blog:noblogs' => 'Sem entradas no blog'
);

add_translation('pt', $portugues);
