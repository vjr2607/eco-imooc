<?php
/**
 * Elgg groups plugin language pack
 *
 * @package ElggGroups
 */

$portugues = array(

	/**
	 * Menu items and titles
	 */
	'groups' => "Grupos",
	'groups:owned' => "Grupos que possuo",
	'groups:owned:user' => 'Grupos de %s',
	'groups:yours' => "Os meus grupos",
	'groups:user' => "Os grupos de %s",
	'groups:all' => "Todos os grupos",
	'groups:add' => "Criar novo grupo",
	'groups:edit' => "Modificar grupo",
	'groups:delete' => 'Apagar grupo',
	'groups:membershiprequests' => 'Gerir pedidos de admissão',
	'groups:invitations' => 'Convites para o grupo',

	'groups:icon' => 'Ícone do grupo (deixar em branco para manter inalterado)',
	'groups:name' => 'Nome do grupo',
	'groups:username' => 'Nome curto do grupo (apenas caracteres alfanuméricos)',
	'groups:description' => 'Descrição',
	'groups:briefdescription' => 'Breve descrição',
	'groups:interests' => 'Etiquetas',
	'groups:website' => 'Website',
	'groups:members' => 'Membros do grupo',
	'groups:members:title' => 'Membros de %s',
	'groups:members:more' => "Ver todos os membros",
	'groups:membership' => "Permissões de pertença ao grupo",
	'groups:access' => "Permissões de acesso",
	'groups:owner' => "Gestor",
	'groups:widget:num_display' => 'Número de grupos a mostrar',
	'groups:widget:membership' => 'Pertença ao grupo',
	'groups:widgets:description' => 'Mostrar grupos de que é membro no seu perfil',
	'groups:noaccess' => 'Sem acesso ao grupo',
	'groups:permissions:error' => 'Não tem permissões para isto',
	'groups:ingroup' => 'no grupo',
	'groups:cantedit' => 'Não pode modificar este grupo',
	'groups:saved' => 'Grupo gravado',
	'groups:featured' => 'Featured groups',
	'groups:makeunfeatured' => 'Unfeature',
	'groups:makefeatured' => 'Make featured',
	'groups:featuredon' => '%s is now a featured group.',
	'groups:unfeatured' => '%s has been removed from the featured groups.',
	'groups:featured_error' => 'Grupo inválido.',
	'groups:joinrequest' => 'Pedir admissão',
	'groups:join' => 'Juntar-se ao grupo',
	'groups:leave' => 'Sair do grupo',
	'groups:invite' => 'Convidar seguidos',
	'groups:invite:title' => 'Convidar seguidos para este grupo',
	'groups:inviteto' => "Convidar seguidos para '%s'",
	'groups:nofriends' => "You have no friends left who have not been invited to this group.",
	'groups:nofriendsatall' => 'You have no friends to invite!',
	'groups:viagroups' => "via grupos",
	'groups:group' => "Grupo",
	'groups:search:tags' => "etiqueta",
	'groups:search:title' => "Pesquisar grupos com a etiqueta '%s'",
	'groups:search:none' => "Não foram encontrados grupos com o critério indicado",
	'groups:search_in_group' => "Pesquisar neste grupo",
	'groups:acl' => "Grupo: %s",

	'discussion:notification:topic:subject' => 'Novo post de discussão do grupo',
	'groups:notification' =>
'%s adicionou um novo tópico de discussão a %s:

%s
%s

View and reply to the discussion:
%s
',

	'discussion:notification:reply:body' =>
'%s respondeu ao tópico de discussão %s no grupo %s:

%s

Ver e participar na discussão:
%s
',

	'groups:activity' => "Atividade do grupo",
	'groups:enableactivity' => 'Ativar atividade do grupo',
	'groups:activity:none' => "O grupo ainda não tem atividade",

	'groups:notfound' => "Grupo não encontrado",
	'groups:notfound:details' => "O grupo solicitado não existe",

	'groups:requests:none' => 'Não há pedidos de adesão pendentes.',

	'groups:invitations:none' => 'Não há convites pendentes.',

	'item:object:groupforumtopic' => "Tópicos de discussão",

	'groupforumtopic:new' => "Adicionar post à discussão",

	'groups:count' => "grupos criados",
	'groups:open' => "grupo aberto",
	'groups:closed' => "grupo fechado",
	'groups:member' => "membros",
	'groups:searchtag' => "Pesquisar grupos por etiqueta",

	'groups:more' => 'Mais grupos',
	'groups:none' => 'Sem grupos',


	/*
	 * Access
	 */
	'groups:access:private' => 'Closed - Users must be invited',
	'groups:access:public' => 'Open - Any user may join',
	'groups:access:group' => 'Group members only',
	'groups:closedgroup' => 'This group has a closed membership.',
	'groups:closedgroup:request' => 'To ask to be added, click the "request membership" menu link.',
	'groups:visibility' => 'Who can see this group?',

	/*
	Group tools
	*/
	'groups:enableforum' => 'Ativar discussão do grupo',
	'groups:yes' => 'sim',
	'groups:no' => 'não',
	'groups:lastupdated' => 'Atualizado %s por %s',
	'groups:lastcomment' => 'Último comentário %s por %s',

	/*
	Group discussion
	*/
	'discussion' => 'Discussão',
	'discussion:add' => 'Adicionar tópico de discussão',
	'discussion:latest' => 'Discussão recente',
	'discussion:group' => 'Discussão do grupo',
	'discussion:none' => 'Sem disussão',
	'discussion:reply:title' => 'Resposta por %s',

	'discussion:topic:created' => 'O tópico de discussão foi criado.',
	'discussion:topic:updated' => 'O tópico de discussão foi atualizado.',
	'discussion:topic:deleted' => 'O tópico de discussão foi apagado.',

	'discussion:topic:notfound' => 'Tópico de discussão não encontrado',
	'discussion:error:notsaved' => 'Não foi possível gravar este tópico',
	'discussion:error:missing' => 'Both title and message are required fields',
	'discussion:error:permissions' => 'You do not have permissions to perform this action',
	'discussion:error:notdeleted' => 'Could not delete the discussion topic',

	'discussion:reply:deleted' => 'Discussion reply has been deleted.',
	'discussion:reply:error:notdeleted' => 'Could not delete the discussion reply',

	'reply:this' => 'Reply to this',

	'group:replies' => 'Replies',
	'groups:forum:created' => 'Created %s with %d comments',
	'groups:forum:created:single' => 'Created %s with %d reply',
	'groups:forum' => 'Discussion',
	'groups:addtopic' => 'Add a topic',
	'groups:forumlatest' => 'Discussão recente',
	'groups:latestdiscussion' => 'Discussão recente',
	'groups:newest' => 'Recentes',
	'groups:popular' => 'Populares',
	'groupspost:success' => 'Your reply was succesfully posted',
	'groups:alldiscussion' => 'Discussão recente',
	'groups:edittopic' => 'Edit topic',
	'groups:topicmessage' => 'Topic message',
	'groups:topicstatus' => 'Topic status',
	'groups:reply' => 'Post a comment',
	'groups:topic' => 'Topic',
	'groups:posts' => 'Posts',
	'groups:lastperson' => 'Last person',
	'groups:when' => 'When',
	'grouptopic:notcreated' => 'No topics have been created.',
	'groups:topicopen' => 'Open',
	'groups:topicclosed' => 'Closed',
	'groups:topicresolved' => 'Resolved',
	'grouptopic:created' => 'Your topic was created.',
	'groupstopic:deleted' => 'The topic has been deleted.',
	'groups:topicsticky' => 'Sticky',
	'groups:topicisclosed' => 'This discussion is closed.',
	'groups:topiccloseddesc' => 'This discussion is closed and is not accepting new comments.',
	'grouptopic:error' => 'Your group topic could not be created. Please try again or contact a system administrator.',
	'groups:forumpost:edited' => "You have successfully edited the forum post.",
	'groups:forumpost:error' => "There was a problem editing the forum post.",


	'groups:privategroup' => 'This group is closed. Requesting membership.',
	'groups:notitle' => 'Groups must have a title',
	'groups:cantjoin' => 'Can not join group',
	'groups:cantleave' => 'Could not leave group',
	'groups:removeuser' => 'Remove from group',
	'groups:cantremove' => 'Cannot remove user from group',
	'groups:removed' => 'Successfully removed %s from group',
	'groups:addedtogroup' => 'Successfully added the user to the group',
	'groups:joinrequestnotmade' => 'Could not request to join group',
	'groups:joinrequestmade' => 'Requested to join group',
	'groups:joined' => 'Successfully joined group!',
	'groups:left' => 'Successfully left group',
	'groups:notowner' => 'Sorry, you are not the owner of this group.',
	'groups:notmember' => 'Sorry, you are not a member of this group.',
	'groups:alreadymember' => 'You are already a member of this group!',
	'groups:userinvited' => 'User has been invited.',
	'groups:usernotinvited' => 'User could not be invited.',
	'groups:useralreadyinvited' => 'User has already been invited',
	'groups:invite:subject' => "%s you have been invited to join %s!",
	'groups:updated' => "Last reply by %s %s",
	'groups:started' => "Started by %s",
	'groups:joinrequest:remove:check' => 'Are you sure you want to remove this join request?',
	'groups:invite:remove:check' => 'Are you sure you want to remove this invite?',
	'groups:invite:body' => "Hi %s,

%s invited you to join the '%s' group. Click below to view your invitations:

%s",

	'groups:welcome:subject' => "Welcome to the %s group!",
	'groups:welcome:body' => "Hi %s!

You are now a member of the '%s' group! Click below to begin posting!

%s",

	'groups:request:subject' => "%s has requested to join %s",
	'groups:request:body' => "Hi %s,

%s has requested to join the '%s' group. Click below to view their profile:

%s

or click below to view the group's join requests:

%s",

	/*
		Forum river items
	*/

	'river:create:group:default' => '%s created the group %s',
	'river:join:group:default' => '%s joined the group %s',
	'river:create:object:groupforumtopic' => '%s added a new discussion topic %s',
	'river:reply:object:groupforumtopic' => '%s replied on the discussion topic %s',
	
	'groups:nowidgets' => 'No widgets have been defined for this group.',


	'groups:widgets:members:title' => 'Group members',
	'groups:widgets:members:description' => 'List the members of a group.',
	'groups:widgets:members:label:displaynum' => 'List the members of a group.',
	'groups:widgets:members:label:pleaseedit' => 'Please configure this widget.',

	'groups:widgets:entities:title' => "Objects in group",
	'groups:widgets:entities:description' => "List the objects saved in this group",
	'groups:widgets:entities:label:displaynum' => 'List the objects of a group.',
	'groups:widgets:entities:label:pleaseedit' => 'Please configure this widget.',

	'groups:forumtopic:edited' => 'Forum topic successfully edited.',

	'groups:allowhiddengroups' => 'Do you want to allow private (invisible) groups?',

	/**
	 * Action messages
	 */
	'group:deleted' => 'Group and group contents deleted',
	'group:notdeleted' => 'Group could not be deleted',

	'group:notfound' => 'Could not find the group',
	'grouppost:deleted' => 'Group posting successfully deleted',
	'grouppost:notdeleted' => 'Group posting could not be deleted',
	'groupstopic:deleted' => 'Topic deleted',
	'groupstopic:notdeleted' => 'Topic not deleted',
	'grouptopic:blank' => 'No topic',
	'grouptopic:notfound' => 'Could not find the topic',
	'grouppost:nopost' => 'Empty post',
	'groups:deletewarning' => "Are you sure you want to delete this group? There is no undo!",

	'groups:invitekilled' => 'The invite has been deleted.',
	'groups:joinrequestkilled' => 'The join request has been deleted.',

	// ecml
	'groups:ecml:discussion' => 'Group Discussions',
	'groups:ecml:groupprofile' => 'Group profiles',

);

add_translation("pt", $portugues);
