<?php
/**
 * Bookmarks Portuguese language file
 */

$portugues = array(

	/**
	 * Menu items and titles
	 */
	'bookmarks' => "Favoritos",
	'bookmarks:add' => "Adicionar favorito",
	'bookmarks:edit' => "Mofificar favorito",
	'bookmarks:owner' => "Os favoritos de %s",
	'bookmarks:friends' => "Favoritos dos amigos",
	'bookmarks:everyone' => "Todos os favoritos do sítio",
	'bookmarks:this' => "Adicionar aos favoritos",
	'bookmarks:this:group' => "Adicionar aos favoritos em %s",
	'bookmarks:bookmarklet' => "Partilhar no imoocac13",
	'bookmarks:bookmarklet:group' => "Partilhar no imoocac13 (grupo)",
	'bookmarks:inbox' => "Lista de favoritos",
	'bookmarks:morebookmarks' => "Mais favoritos",
	'bookmarks:more' => "Mais",
	'bookmarks:with' => "Partilhar com",
	'bookmarks:new' => "Um novo favorito",
	'bookmarks:via' => "via favoritos",
	'bookmarks:address' => "Endereço do recurso do favorito",
	'bookmarks:none' => 'Sem favoritos',

	'bookmarks:delete:confirm' => "Tem a certeza que quer eliminar este recurso?",

	'bookmarks:numbertodisplay' => 'Número de favoritos a mostrar',

	'bookmarks:shared' => "Favorito",
	'bookmarks:visit' => "Visitar recurso",
	'bookmarks:recent' => "Favoritos recentes",

	'river:create:object:bookmarks' => '%s adicionou %s aos favoritos',
	'bookmarks:river:annotate' => 'um comentário sobre este favorito',
	'bookmarks:river:item' => 'um item',
	'river:comment:object:bookmarks' => '%s comentou um favorito %s',

	'item:object:bookmarks' => 'Favoritos',

	'bookmarks:group' => 'Favoritos do grupo',
	'bookmarks:enablebookmarks' => 'Ativar favoritos do grupo',
	'bookmarks:nogroup' => 'Este grupo ainda não tem favoritos',
	'bookmarks:more' => 'Mais favoritos',

	'bookmarks:no_title' => 'Sem título',

	/**
	 * Widget and bookmarklet
	 */
	'bookmarks:widget:description' => "Mostrar os seus favoritos recentes.",

	'bookmarks:bookmarklet:description' =>
			"O ícone de favoritos permite-lhe partilhar qualquer recurso que encontrar na web com os seus amigos, ou apenas guardar o favorito para si. Para o usar, basta arrastar o seguinte botão para a barra de hiperligações do seu browser:",

	'bookmarks:bookmarklet:descriptionie' =>
			"Se estiver a usar o Internet Explorer, deverá clicar com o botão direito no ícone, seleccionar, 'adicionar aos favoritos', e depois na barra de hiperligações.",

	'bookmarks:bookmarklet:description:conclusion' =>
			"Pode depois gravar qualquer página que visite clicando no ícone em qualquer momento.",

	/**
	 * Status messages
	 */

	'bookmarks:save:success' => "Adicionou o seu item com sucesso aos favoritos.",
	'bookmarks:delete:success' => "O seu favorito foi eliminado com sucesso.",

	/**
	 * Error messages
	 */

	'bookmarks:save:failed' => "Não foi possível gravar o seu favorito. Verifique se inseriu um título e endereço e tente novamente.",
	'bookmarks:delete:failed' => "Não foi possível eliminar o seu favorito. Por favor tente novamente.",
);

add_translation('pt', $portugues);
