<?php
/**
 * Pages languages
 *
 * @package ElggPages
 */

$portugues = array(

	/**
	 * Menu items and titles
	 */

	'pages' => "Wikis",
	'pages:owner' => "Os wikis de %s",
	'pages:friends' => "Wikis de amigos",
	'pages:all' => "Todos os wikis do site",
	'pages:add' => "Adicionar wiki",

	'pages:group' => "Wikis de grupos",
	'groups:enablepages' => 'Activar wikis de grupos',

	'pages:edit' => "Modificar este wiki",
	'pages:delete' => "Eliminar este wiki",
	'pages:history' => "Histórico",
	'pages:view' => "Ver wiki",
	'pages:revision' => "Revisão",

	'pages:navigation' => "Navegação",
	'pages:via' => "via wikis",
	'item:object:page_top' => 'Páginas de topo',
	'item:object:page' => 'Páginas',
	'pages:nogroup' => 'Este grupo ainda não tem wikis',
	'pages:more' => 'Mais wikis',
	'pages:none' => 'Ainda não foram criados wikis',

	/**
	* River
	**/

	'pages:river:create' => 'criou o wiki',
	'pages:river:created' => "%s escreveu",
	'pages:river:updated' => "%s actualizou",
	'pages:river:posted' => "%s inseriu",
	'pages:river:update' => "um wiki com o título",
	'river:comment:object:page' => '%s comentou a página %s',
	'river:comment:object:page_top' => '%s comentou a página %s',

	/**
	 * Form fields
	 */

	'pages:title' => 'Título da página',
	'pages:description' => 'Texto da página',
	'pages:tags' => 'Etiquetas',
	'pages:access_id' => 'Acesso para leitura',
	'pages:write_access_id' => 'Acesso para escrita',

	/**
	 * Status and error messages
	 */
	'pages:noaccess' => 'Não tem acesso à página',
	'pages:cantedit' => 'Não pode modificar esta página',
	'pages:saved' => 'Página gravada',
	'pages:notsaved' => 'Não foi possível gravar a página',
	'pages:error:no_title' => 'Tem de especificar um título para esta página.',
	'pages:delete:success' => 'A página foi eliminada com sucesso.',
	'pages:delete:failure' => 'Não foi possível eliminar a página.',

	/**
	 * Page
	 */
	'pages:strapline' => 'Atualizada pela última vez %s por %s',

	/**
	 * History
	 */
	'pages:revision:subtitle' => 'Revisão criada %s por %s',

	/**
	 * Widget
	 **/

	'pages:num' => 'Número de páginas a mostrar',
	'pages:widget:description' => "Esta é uma lista das suas páginas.",

	/**
	 * Submenu items
	 */
	'pages:label:view' => "Ver página",
	'pages:label:edit' => "Modificar página",
	'pages:label:history' => "Histórico da página",

	/**
	 * Sidebar items
	 */
	'pages:sidebar:this' => "Esta página",
	'pages:sidebar:children' => "Sub-páginas",
	'pages:sidebar:parent' => "Pai",

	'pages:newchild' => "Criar uma sub-página",
	'pages:backtoparent' => "Voltar a '%s'",
);

add_translation("pt", $portugues);
