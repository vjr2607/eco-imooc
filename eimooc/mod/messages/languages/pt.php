<?php
/**
* Elgg send a message action page
* 
* @package ElggMessages
*/

$portugues = array(
	/**
	* Menu items and titles
	*/

	'messages' => "Mensagens",
	'messages:unreadcount' => "%s não lidas",
	'messages:back' => "voltar a mensagens",
	'messages:user' => "caixa de mensagens de %s",
	'messages:posttitle' => "mensagens de %s: %s",
	'messages:inbox' => "Inbox",
	'messages:send' => "Enviar",
	'messages:sent' => "Enviadas",
	'messages:message' => "Mensagem",
	'messages:title' => "Assunto",
	'messages:to' => "Para",
	'messages:from' => "de",
	'messages:fly' => "Enviar",
	'messages:replying' => "Mensagem de resposta a",
	'messages:inbox' => "Inbox",
	'messages:sendmessage' => "Enviar uma mensagem",
	'messages:compose' => "Compor uma mensageme",
	'messages:add' => "Compor uma mensagem",
	'messages:sentmessages' => "Mensagens enviadas",
	'messages:recent' => "Mensagens recentes",
	'messages:original' => "Mensagem original",
	'messages:yours' => "A sua mensagem",
	'messages:answer' => "Responder",
	'messages:toggle' => 'Trocar tudo',
	'messages:markread' => 'Marcar como lida',
	'messages:recipient' => 'Escolher destinatário&hellip;',
	'messages:to_user' => 'Para: %s',

	'messages:new' => 'Nova mensagem',

	'notification:method:site' => 'Site',

	'messages:error' => 'There was a problem saving your message. Please try again.',

	'item:object:messages' => 'Mensagens',

	/**
	* Status messages
	*/

	'messages:posted' => "Your message was successfully sent.",
	'messages:success:delete:single' => 'Message was deleted',
	'messages:success:delete' => 'Messages deleted',
	'messages:success:read' => 'Messages marked as read',
	'messages:error:messages_not_selected' => 'No messages selected',
	'messages:error:delete:single' => 'Unable to delete the message',

	/**
	* Email messages
	*/

	'messages:email:subject' => 'You have a new message!',
	'messages:email:body' => "You have a new message from %s. It reads:


	%s


	To view your messages, click here:

	%s

	To send %s a message, click here:

	%s

	You cannot reply to this email.",

	/**
	* Error messages
	*/

	'messages:blank' => "Sorry; you need to actually put something in the message body before we can save it.",
	'messages:notfound' => "Sorry; we could not find the specified message.",
	'messages:notdeleted' => "Sorry; we could not delete this message.",
	'messages:nopermission' => "You do not have permission to alter that message.",
	'messages:nomessages' => "There are no messages.",
	'messages:user:nonexist' => "We could not find the recipient in the user database.",
	'messages:user:blank' => "You did not select someone to send this to.",

	'messages:deleted_sender' => 'Deleted user',

);
		
add_translation("pt", $portugues);
