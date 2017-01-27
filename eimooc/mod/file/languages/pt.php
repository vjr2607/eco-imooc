<?php
/**
 * Elgg file plugin language pack
 *
 * @package ElggFile
 */

$portugues = array(

	/**
	 * Menu items and titles
	 */
	'file' => "Ficheiros",
	'files' => "Os meus ficheiros",
	'file:yours' => "Os seus ficheiros",
	'file:yours:friends' => "Os ficheiros dos seus amigos",
	'file:user' => "Os ficheiros de %s",
	'file:friends' => "Os ficheiros dos amigos de %s",
	'file:all' => "Todos os ficheiros do sítio",
	'file:edit' => "Modificar ficheiro",
	'file:more' => "Mais ficheiros",
	'file:list' => "vista de listagem",
	'file:group' => "Ficheiros do grupo",
	'file:gallery' => "vista de galeria",
	'file:gallery_list' => "Vista de listagem ou galeria",
	'file:num_files' => "Número de ficheiros a mostrar",
	'file:user:gallery'=>'Ver galeria de %s',
	'file:via' => 'via ficheiros',
	'file:upload' => "Carregar um ficheiro",
	'file:replace' => 'Substituir ficheiro (deixe em branco para não alterar o ficheiro)',
	'file:list:title' => "%s' %s %s", // vjr - Inverse worder
	'file:title:friends' => "Friends'",

	'file:add' => 'Carregar um ficheiro',

	'file:file' => "Ficheiro",
	'file:title' => "Título",
	'file:desc' => "Descrição",
	'file:tags' => "Etiquetas",

	'file:types' => "Tipos de ficheiros carregados",

	'file:type:' => 'Ficheiros',
	'file:type:all' => "Todos os ficheiros",
	'file:type:video' => "Vídeos",
	'file:type:document' => "Documentos",
	'file:type:audio' => "Audio",
	'file:type:image' => "Imagens",
	'file:type:general' => "Geral",

	'file:user:type:video' => "os vídeos de %s",
	'file:user:type:document' => "os documentos de %s",
	'file:user:type:audio' => "o audio de %s",
	'file:user:type:image' => "as imagens de %s",
	'file:user:type:general' => "os ficheiros gerais de %s",

	'file:friends:type:video' => "Os vídeos dos seus amigos",
	'file:friends:type:document' => "Os documentos dos seus amigos",
	'file:friends:type:audio' => "O audio dos seus amigos",
	'file:friends:type:image' => "As imagens dos seus amigos",
	'file:friends:type:general' => "Os ficheiros gerais dos seus amigos",

	'file:widget' => "Widget para ficheiros",
	'file:widget:description' => "Mostre os seus ficheiros recentes",

	'groups:enablefiles' => 'Ativar ficheiros de grupo',

	'file:download' => "Descarregar isto",

	'file:delete:confirm' => "Tem a certeza que quer eliminar este ficheiro?",

	'file:tagcloud' => "Nuvem de etiquetas",

	'file:display:number' => "Número de ficheiros a mostrar",

	'river:create:object:file' => "%s carregou o ficheiro %s",
	'river:comment:object:file' => '%s comentou o ficheiro %s',

	'item:object:file' => 'Ficheiros',

	/**
	 * Embed media
	 **/

		'file:embed' => "Embeber media",
		'file:embedall' => "Tudo",

	/**
	 * Status messages
	 */

		'file:saved' => "O seu ficheiro foi gravado com sucesso.",
		'file:deleted' => "O seu ficheiro foi eliminado com sucesso.",

	/**
	 * Error messages
	 */

		'file:none' => "Sem ficheiros carregados.",
		'file:uploadfailed' => "Não foi possível gravar o seu ficheiro.",
		'file:downloadfailed' => "Este ficheiro não está disponível neste momento.",
		'file:deletefailed' => "Não foi possível eliminar o seu ficheiro neste momento.",
		'file:noaccess' => "Não tem permissões para modificar este ficheiro",
		'file:cannotload' => "Ocorreu um erro ao carregar o ficheiro",
		'file:nofile' => "Deve seleccionar um ficheiro",
);

add_translation("pt", $portugues);
