<?php
/**
 * Core Portuguese (European) Language
 *
 * @package Elgg.Core
 * @subpackage Languages.Portuguese
 */

$portugues = array(
/**
 * Sites
 */

	'item:site' => 'Sítios',

/**
 * Sessions
 */

	'login' => "Entrar",
	'loginok' => "Você entrou no sistema.",
	'loginerror' => "Erro ao entrar no sistema. Por favor verifique as suas credenciais e tente novamente.",
	'login:empty' => "Por favor preencha o nome de utilizador e a senha.",
	'login:baduser' => "Não foi possível carregar a sua conta de utilizador.",
	'auth:nopams' => "Erro interno. Nenhum método de autenticação de utilizadores instalado.",

	'logout' => "Sair",
	'logoutok' => "Você saiu do sistema.",
	'logouterror' => "Erro ao sair do sistema. Por favor tente novamente.",

	'loggedinrequired' => "Deverá entrar no sistema para ver essa página.",
	'adminrequired' => "Só o administrador pode ver essa página.",
	'membershiprequired' => "Deve ser membro deste grupo para ver essa página.",


/**
 * Errors - FALTA COMPLETAR
 */
	'exception:title' => "Erro Fatal.",

	'actionundefined' => "A acção solicitada (%s) não foi definida no sistema.",
	'actionnotfound' => "O ficheiro da acção %s não foi encontrado.",
	'actionloggedout' => "Sorry, you cannot perform this action while logged out.",
	'actionunauthorized' => 'You are unauthorized to perform this action',

	'InstallationException:SiteNotInstalled' => 'Unable to handle this request. This site '
		. ' is not configured or the database is down.',
	'InstallationException:MissingLibrary' => 'Could not load %s',
	'InstallationException:CannotLoadSettings' => 'Elgg could not load the settings file. It does not exist or there is a file permissions issue.',

	'SecurityException:Codeblock' => "Denied access to execute privileged code block",
	'DatabaseException:WrongCredentials' => "Elgg couldn't connect to the database using the given credentials. Check the settings file.",
	'DatabaseException:NoConnect' => "Elgg couldn't select the database '%s', please check that the database is created and you have access to it.",
	'SecurityException:FunctionDenied' => "Access to privileged function '%s' is denied.",
	'DatabaseException:DBSetupIssues' => "There were a number of issues: ",
	'DatabaseException:ScriptNotFound' => "Elgg couldn't find the requested database script at %s.",
	'DatabaseException:InvalidQuery' => "Invalid query",

	'IOException:FailedToLoadGUID' => "Failed to load new %s from GUID:%d",
	'InvalidParameterException:NonElggObject' => "Passing a non-ElggObject to an ElggObject constructor!",
	'InvalidParameterException:UnrecognisedValue' => "Unrecognised value passed to constuctor.",

	'InvalidClassException:NotValidElggStar' => "GUID:%d is not a valid %s",

	'PluginException:MisconfiguredPlugin' => "%s (guid: %s) is a misconfigured plugin. It has been disabled. Please search the Elgg wiki for possible causes (http://docs.elgg.org/wiki/).",
	'PluginException:CannotStart' => '%s (guid: %s) cannot start.  Reason: %s',
	'PluginException:InvalidID' => "%s is an invalid plugin ID.",
	'PluginException:InvalidPath' => "%s is an invalid plugin path.",
	'PluginException:InvalidManifest' => 'Invalid manifest file for plugin %s',
	'PluginException:InvalidPlugin' => '%s is not a valid plugin.',
	'PluginException:InvalidPlugin:Details' => '%s is not a valid plugin: %s',

	'ElggPlugin:MissingID' => 'Missing plugin ID (guid %s)',
	'ElggPlugin:NoPluginPackagePackage' => 'Missing ElggPluginPackage for plugin ID %s (guid %s)',

	'ElggPluginPackage:InvalidPlugin:MissingFile' => 'Missing file %s in package',
	'ElggPluginPackage:InvalidPlugin:InvalidDependency' => 'Invalid dependency type "%s"',
	'ElggPluginPackage:InvalidPlugin:InvalidProvides' => 'Invalid provides type "%s"',
	'ElggPluginPackage:InvalidPlugin:CircularDep' => 'Invalid %s dependency "%s" in plugin %s.  Plugins cannot conflict with or require something they provide!',

	'ElggPlugin:Exception:CannotIncludeFile' => 'Cannot include %s for plugin %s (guid: %s) at %s.  Check permissions!',
	'ElggPlugin:Exception:CannotRegisterViews' => 'Cannot open views dir for plugin %s (guid: %s) at %s.  Check permissions!',
	'ElggPlugin:Exception:CannotRegisterLanguages' => 'Cannot register languages for plugin %s (guid: %s) at %s.  Check permissions!',
	'ElggPlugin:Exception:CannotRegisterClasses' => 'Cannot register classes for plugin %s (guid: %s) at %s.  Check permissions!',
	'ElggPlugin:Exception:NoID' => 'No ID for plugin guid %s!',

	'PluginException:ParserError' => 'Error parsing manifest with API version %s in plugin %s.',
	'PluginException:NoAvailableParser' => 'Cannot find a parser for manifest API version %s in plugin %s.',
	'PluginException:ParserErrorMissingRequiredAttribute' => "Missing required '%s' attribute in manifest for plugin %s.",

	'ElggPlugin:Dependencies:Requires' => 'Requires',
	'ElggPlugin:Dependencies:Suggests' => 'Suggests',
	'ElggPlugin:Dependencies:Conflicts' => 'Conflicts',
	'ElggPlugin:Dependencies:Conflicted' => 'Conflicted',
	'ElggPlugin:Dependencies:Provides' => 'Provides',
	'ElggPlugin:Dependencies:Priority' => 'Priority',

	'ElggPlugin:Dependencies:Elgg' => 'Elgg version',
	'ElggPlugin:Dependencies:PhpExtension' => 'PHP extension: %s',
	'ElggPlugin:Dependencies:PhpIni' => 'PHP ini setting: %s',
	'ElggPlugin:Dependencies:Plugin' => 'Plugin: %s',
	'ElggPlugin:Dependencies:Priority:After' => 'After %s',
	'ElggPlugin:Dependencies:Priority:Before' => 'Before %s',
	'ElggPlugin:Dependencies:Priority:Uninstalled' => '%s is not installed',
	'ElggPlugin:Dependencies:Suggests:Unsatisfied' => 'Missing',


	'InvalidParameterException:NonElggUser' => "Passing a non-ElggUser to an ElggUser constructor!",

	'InvalidParameterException:NonElggSite' => "Passing a non-ElggSite to an ElggSite constructor!",

	'InvalidParameterException:NonElggGroup' => "Passing a non-ElggGroup to an ElggGroup constructor!",

	'IOException:UnableToSaveNew' => "Unable to save new %s",

	'InvalidParameterException:GUIDNotForExport' => "GUID has not been specified during export, this should never happen.",
	'InvalidParameterException:NonArrayReturnValue' => "Entity serialisation function passed a non-array returnvalue parameter",

	'ConfigurationException:NoCachePath' => "Cache path set to nothing!",
	'IOException:NotDirectory' => "%s is not a directory.",

	'IOException:BaseEntitySaveFailed' => "Unable to save new object's base entity information!",
	'InvalidParameterException:UnexpectedODDClass' => "import() passed an unexpected ODD class",
	'InvalidParameterException:EntityTypeNotSet' => "Entity type must be set.",

	'ClassException:ClassnameNotClass' => "%s is not a %s.",
	'ClassNotFoundException:MissingClass' => "Class '%s' was not found, missing plugin?",
	'InstallationException:TypeNotSupported' => "Type %s is not supported. This indicates an error in your installation, most likely caused by an incomplete upgrade.",

	'ImportException:ImportFailed' => "Could not import element %d",
	'ImportException:ProblemSaving' => "There was a problem saving %s",
	'ImportException:NoGUID' => "New entity created but has no GUID, this should not happen.",

	'ImportException:GUIDNotFound' => "Entity '%d' could not be found.",
	'ImportException:ProblemUpdatingMeta' => "There was a problem updating '%s' on entity '%d'",

	'ExportException:NoSuchEntity' => "No such entity GUID:%d",

	'ImportException:NoODDElements' => "No OpenDD elements found in import data, import failed.",
	'ImportException:NotAllImported' => "Not all elements were imported.",

	'InvalidParameterException:UnrecognisedFileMode' => "Unrecognised file mode '%s'",
	'InvalidParameterException:MissingOwner' => "File %s (file guid:%d) (owner guid:%d) is missing an owner!",
	'IOException:CouldNotMake' => "Could not make %s",
	'IOException:MissingFileName' => "You must specify a name before opening a file.",
	'ClassNotFoundException:NotFoundNotSavedWithFile' => "Unable to load filestore class %s for file %u",
	'NotificationException:NoNotificationMethod' => "No notification method specified.",
	'NotificationException:NoHandlerFound' => "No handler found for '%s' or it was not callable.",
	'NotificationException:ErrorNotifyingGuid' => "There was an error while notifying %d",
	'NotificationException:NoEmailAddress' => "Could not get the email address for GUID:%d",
	'NotificationException:MissingParameter' => "Missing a required parameter, '%s'",

	'DatabaseException:WhereSetNonQuery' => "Where set contains non WhereQueryComponent",
	'DatabaseException:SelectFieldsMissing' => "Fields missing on a select style query",
	'DatabaseException:UnspecifiedQueryType' => "Unrecognised or unspecified query type.",
	'DatabaseException:NoTablesSpecified' => "No tables specified for query.",
	'DatabaseException:NoACL' => "No access control was provided on query",

	'InvalidParameterException:NoEntityFound' => "No entity found, it either doesn't exist or you don't have access to it.",

	'InvalidParameterException:GUIDNotFound' => "GUID:%s could not be found, or you can not access it.",
	'InvalidParameterException:IdNotExistForGUID' => "Sorry, '%s' does not exist for guid:%d",
	'InvalidParameterException:CanNotExportType' => "Sorry, I don't know how to export '%s'",
	'InvalidParameterException:NoDataFound' => "Could not find any data.",
	'InvalidParameterException:DoesNotBelong' => "Does not belong to entity.",
	'InvalidParameterException:DoesNotBelongOrRefer' => "Does not belong to entity or refer to entity.",
	'InvalidParameterException:MissingParameter' => "Missing parameter, you need to provide a GUID.",
	'InvalidParameterException:LibraryNotRegistered' => '%s is not a registered library',

	'APIException:ApiResultUnknown' => "API Result is of an unknown type, this should never happen.",
	'ConfigurationException:NoSiteID' => "No site ID has been specified.",
	'SecurityException:APIAccessDenied' => "Sorry, API access has been disabled by the administrator.",
	'SecurityException:NoAuthMethods' => "No authentication methods were found that could authenticate this API request.",
	'InvalidParameterException:APIMethodOrFunctionNotSet' => "Method or function not set in call in expose_method()",
	'InvalidParameterException:APIParametersArrayStructure' => "Parameters array structure is incorrect for call to expose method '%s'",
	'InvalidParameterException:UnrecognisedHttpMethod' => "Unrecognised http method %s for api method '%s'",
	'APIException:MissingParameterInMethod' => "Missing parameter %s in method %s",
	'APIException:ParameterNotArray' => "%s does not appear to be an array.",
	'APIException:UnrecognisedTypeCast' => "Unrecognised type in cast %s for variable '%s' in method '%s'",
	'APIException:InvalidParameter' => "Invalid parameter found for '%s' in method '%s'.",
	'APIException:FunctionParseError' => "%s(%s) has a parsing error.",
	'APIException:FunctionNoReturn' => "%s(%s) returned no value.",
	'APIException:APIAuthenticationFailed' => "Method call failed the API Authentication",
	'APIException:UserAuthenticationFailed' => "Method call failed the User Authentication",
	'SecurityException:AuthTokenExpired' => "Authentication token either missing, invalid or expired.",
	'CallException:InvalidCallMethod' => "%s must be called using '%s'",
	'APIException:MethodCallNotImplemented' => "Method call '%s' has not been implemented.",
	'APIException:FunctionDoesNotExist' => "Function for method '%s' is not callable",
	'APIException:AlgorithmNotSupported' => "Algorithm '%s' is not supported or has been disabled.",
	'ConfigurationException:CacheDirNotSet' => "Cache directory 'cache_path' not set.",
	'APIException:NotGetOrPost' => "Request method must be GET or POST",
	'APIException:MissingAPIKey' => "Missing API key",
	'APIException:BadAPIKey' => "Bad API key",
	'APIException:MissingHmac' => "Missing X-Elgg-hmac header",
	'APIException:MissingHmacAlgo' => "Missing X-Elgg-hmac-algo header",
	'APIException:MissingTime' => "Missing X-Elgg-time header",
	'APIException:MissingNonce' => "Missing X-Elgg-nonce header",
	'APIException:TemporalDrift' => "X-Elgg-time is too far in the past or future. Epoch fail.",
	'APIException:NoQueryString' => "No data on the query string",
	'APIException:MissingPOSTHash' => "Missing X-Elgg-posthash header",
	'APIException:MissingPOSTAlgo' => "Missing X-Elgg-posthash_algo header",
	'APIException:MissingContentType' => "Missing content type for post data",
	'SecurityException:InvalidPostHash' => "POST data hash is invalid - Expected %s but got %s.",
	'SecurityException:DupePacket' => "Packet signature already seen.",
	'SecurityException:InvalidAPIKey' => "Invalid or missing API Key.",
	'NotImplementedException:CallMethodNotImplemented' => "Call method '%s' is currently not supported.",

	'NotImplementedException:XMLRPCMethodNotImplemented' => "XML-RPC method call '%s' not implemented.",
	'InvalidParameterException:UnexpectedReturnFormat' => "Call to method '%s' returned an unexpected result.",
	'CallException:NotRPCCall' => "Call does not appear to be a valid XML-RPC call",

	'PluginException:NoPluginName' => "The plugin name could not be found",

	'SecurityException:authenticationfailed' => "User could not be authenticated",

	'CronException:unknownperiod' => '%s is not a recognised period.',

	'SecurityException:deletedisablecurrentsite' => 'You can not delete or disable the site you are currently viewing!',

	'RegistrationException:EmptyPassword' => 'The password fields cannot be empty',
	'RegistrationException:PasswordMismatch' => 'Passwords must match',
	'LoginException:BannedUser' => 'You have been banned from this site and cannot log in',
	'LoginException:UsernameFailure' => 'Erro ao entrar no sistema. Por favor verifique as suas credenciais e tente novamente.',
	'LoginException:PasswordFailure' => 'Erro ao entrar no sistema. Por favor verifique as suas credenciais e tente novamente.',
	'LoginException:AccountLocked' => 'Your account has been locked for too many log in failures.',

	'memcache:notinstalled' => 'PHP memcache module not installed, you must install php5-memcache',
	'memcache:noservers' => 'No memcache servers defined, please populate the $CONFIG->memcache_servers variable',
	'memcache:versiontoolow' => 'Memcache needs at least version %s to run, you are running %s',
	'memcache:noaddserver' => 'Multiple server support disabled, you may need to upgrade your PECL memcache library',

	'deprecatedfunction' => 'Warning: This code uses the deprecated function \'%s\' and is not compatible with this version of Elgg',

	'pageownerunavailable' => 'Warning: The page owner %d is not accessible!',
	'viewfailure' => 'There was an internal failure in the view %s',
	'changebookmark' => 'Please change your bookmark for this page',
/**
 * API
 */
	'system.api.list' => "List all available API calls on the system.",
	'auth.gettoken' => "This API call lets a user obtain a user authentication token which can be used for authenticating future API calls. Pass it as the parameter auth_token",

/**
 * User details
 */

	'name' => "Nome para visualização",
	'email' => "Endereço de email",
	'username' => "Nome de utilizador",
	'loginusername' => "Nome de utilizador ou email",
	'password' => "Senha",
	'passwordagain' => "Senha (confirmar)",
	'admin_option' => "Atribuir permissões de administrador?",

/**
 * Access
 */

	'PRIVATE' => "Privado",
	'LOGGED_IN' => "Utilizadores autenticados",
	'PUBLIC' => "Público",
	'access:friends:label' => "Amigos",
	'access' => "Acesso",

/**
 * Dashboard and widgets
 */

	'dashboard' => "Painel",
	'dashboard:nowidgets' => "O seu painel permite-lhe acompanhar a atividade e conteúdo que lhe interessa neste site.",

	'widgets:add' => 'Adicionar widgets',
	'widgets:add:description' => "Clique num dos botões abaixo para incluir o respetivo widget na página.",
	'widgets:position:fixed' => '(Posição fixa na página)',
	'widget:unavailable' => 'Já adicionou este widget',
	'widget:numbertodisplay' => 'Número de entradas a mostrar',

	'widget:delete' => 'Remover %s',
	'widget:edit' => 'Personalizar este widget',

	'widgets' => "Widgets",
	'widget' => "Widget",
	'item:object:widget' => "Widgets",
	'widgets:save:success' => "O widget foi gravado com sucesso.",
	'widgets:save:failure' => "Não foi possível gravar o seu widget. Por favor tente novamente.",
	'widgets:add:success' => "O widget foi adicionado com sucesso.",
	'widgets:add:failure' => "Não foi possível adicionar o seu widget.",
	'widgets:move:failure' => "Não foi possível colocar o widget na nova posição.",
	'widgets:remove:failure' => "Não foi possível remover este widget",

/**
 * Groups
 */

	'group' => "Grupo",
	'item:group' => "Grupos",

/**
 * Users
 */

	'user' => "Utilizador",
	'item:user' => "Utilizadores",

/**
 * Friends
 */

	'friends' => "Seguidos",
	'friends:yours' => "Seguidos", //"Amigos",
	'friends:owned' => "Seguidos por %s", //"Amigos de %s",
	'friend:add' => "Seguir", //"Adicionar %s como amigo",
	'friend:remove' => "Deixar de seguir", //"Excluir %s como amigo",

	'friends:add:successful' => "Você segue agora %s", //"Você adicionou %s como amigo.",
	'friends:add:failure' => "Não foi possível seguir %s. Por favor tente novamente.", //"Não foi possível adicionar %s como amigo. Por favor tente novamente."

	'friends:remove:successful' => "Você deixou de seguir %s", //"Você excluiu %s como seu amigo.",
	'friends:remove:failure' => "Não foi possível deixar de seguir %s. Por favor tente novamente.", //"Não foi possível excluir %s como seu amigo. Por favor tente novamente.",

	'friends:none' => "Este utilizador ainda não é seguido por ninguém.", //"Este utilizador ainda não adicionou ninguém como amigo.",
	'friends:none:you' => "Você ainda não é seguido por ninguém.", //"Você ainda não tem amigos.",

	'friends:none:found' => "Não foram encontrados seguidos.", //"Não foram encontrados amigos.",

	'friends:of:none' => "Ainda ninguém segue este utilizador.", //"Ainda ninguém adicionou este utilizador como amigo.",
	'friends:of:none:you' => "Ainda ninguém o segue. Comece a incluir conteúdos e preencha o seu perfil para que as outras pessoas o encontrem!", //"Ainda ninguém o adicionou como amigo. Comece a incluir conteúdos e preencha o seu perfil para que as outras pessoas o encontrem!",

	'friends:of:owned' => "Pessoas que seguem %s", //"Pessoas que incluíram %s como amigo",

	'friends:of' => "Seguidores", //"Amigos de",
	'friends:collections' => "Coleções de seguidos", //"Coleções de amigos",
	'collections:add' => "Nova coleção",
	'friends:collections:add' => "Nova coleção de seguidos", //"Nova coleção de amigos",
	'friends:addfriends' => "Selecionar seguidos", //"Selecionar amigos",
	'friends:collectionname' => "Nome da coleção",
	'friends:collectionfriends' => "Seguidos na coleção", //"Amigos na coleção",
	'friends:collectionedit' => "Alterar esta coleção",
	'friends:nocollections' => "Você ainda não tem coleções.",
	'friends:collectiondeleted' => "A sua coleção foi eliminada.",
	'friends:collectiondeletefailed' => "Não foi possível eliminar a coleção, por não ter permissões para tal ou por ter ocorrido outro problema.",
	'friends:collectionadded' => "A sua coleção foi criada com sucesso",
	'friends:nocollectionname' => "Deve atribuir um nome à coleção antes de ser criada.",
	'friends:collections:members' => "Membros da coleção",
	'friends:collections:edit' => "Alterar coleção",

	'friends:river:add' => "tornou-se seguidor de %s", //"tornou-se amigo de %s",

	'friendspicker:chararray' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',

	'avatar' => 'Avatar',
	'avatar:create' => 'Crie o seu avatar',
	'avatar:edit' => 'Alterar avatar',
	'avatar:preview' => 'Previsão',
	'avatar:upload' => 'Carregar um novo avatar',
	'avatar:current' => 'Avatar atual',
	'avatar:crop:title' => 'Ferramenta de corte do Avatar',
	'avatar:upload:instructions' => "O seu avatar é mostrado em todo o sítio. Pode alterá-lo tantas vezes quantas quiser. (Formatos aceites: GIF, JPG ou PNG)",
	'avatar:create:instructions' => 'Clique e arraste um quadrado na imagem abaixo, que reflita o que quer mostrar no seu avatar. Uma pré-visualização aparece na caixa da direita. Quanto estiver satisfeito com a pré-visualização, clique em \'Crie o seu avatar\'. Esta versão cortada será usada no sítio como o seu avatar.',
	'avatar:upload:success' => 'Avatar carregado com sucesso',
	'avatar:upload:fail' => 'Carregamento do avatar falhou',
	'avatar:resize:fail' => 'Redimensionamento do avatar falhou',
	'avatar:crop:success' => 'Avatar cortado com sucesso',
	'avatar:crop:fail' => 'Corte do avatar falhou',

	'profile:edit' => 'Alterar perfil',
	'profile:aboutme' => "Sobre mim",
	'profile:description' => "Sobre mim",
	'profile:briefdescription' => "Breve descrição",
	'profile:location' => "Localização",
	'profile:skills' => "Competências",
	'profile:interests' => "Interesses",
	'profile:contactemail' => "Email de contacto",
	'profile:phone' => "Telefone",
	'profile:mobile' => "Telemóvel",
	'profile:website' => "Página web",
	'profile:twitter' => "Twitter",
	'profile:saved' => "O seu perfil foi gravado com sucesso.",

	'admin:appearance:profile_fields' => 'Alterar campos do perfil',
	'profile:edit:default' => 'Alterar campos do perfil',
	'profile:label' => "Etiqueta do campo",
	'profile:type' => "Tipo do campo",
	'profile:editdefault:delete:fail' => 'Remoção do campo do perfil por omissão falhou',
	'profile:editdefault:delete:success' => 'Eliminado campo do perfil por omissão!',
	'profile:defaultprofile:reset' => 'Reposição do perfil por omissão do sistema',
	'profile:resetdefault' => 'Repor perfil por omissão',
	'profile:explainchangefields' => "Pode substituir os campos do perfil existente por outros que queira usando o formulário abaixo. \n\n Atribua um nome ao novo campo, por exemplo, 'Equipa preferida', selecione o tipo do campo (eg. texto, url, etiquetas), e clique no botão 'Adicionar'. Para reordenar os campos arraste a etiqueta do campo. Para alterar a etiqueta de um campo - clique no texto da etiqueta. \n\n A qualquer momento pode reverter para o perfil por omissão, mas perderá a informação inserida em campos personalizados nas páginas de perfil.",
	'profile:editdefault:success' => 'Campo adicionado com sucesso ao perfil por omissão',
	'profile:editdefault:fail' => 'Perfil por omissão não pode ser gravado',


/**
 * Feeds
 */
	'feed:rss' => 'RSS feed para esta página',
/**
 * Links
 */
	'link:view' => 'ver hiperligação',
	'link:view:all' => 'Ver tudo',


/**
 * River
 */
	'river' => "River",
	'river:friend:user:default' => "%s tornou-se seguidor de %s", //"%s tornou-se amigo de %s",
	'river:noaccess' => 'Não tem permissão para ver este item.',
	'river:posted:generic' => '%s posted',
	'riveritem:single:user' => 'um utilizador',
	'riveritem:plural:user' => 'alguns utilizadores',
	'river:ingroup' => 'no grupo %s',
	'river:none' => 'Sem atividade',

	'river:widget:title' => "Atividade",
	'river:widget:description' => "Mostrar atividade recente",
	'river:widget:type' => "Tipo de atividade",
	'river:widgets:friends' => 'Atividade de seguidos', //'Atividade de amigos',
	'river:widgets:all' => 'Atividade de todo o sítio',

/**
 * Notifications
 */
	'notifications:usersettings' => "Definições de notificação",
	'notifications:methods' => "Por favor especifique os métodos que deseja permitir.",

	'notifications:usersettings:save:ok' => "As suas definições de notificação foram gravadas com sucesso.",
	'notifications:usersettings:save:fail' => "Ocorreu um problema ao gravar as suas definições de notificação.",

	'user.notification.get' => 'Voltar às definições de notificação para um dado utilizador.',
	'user.notification.set' => 'Modificar definições de notificação para um dado utilizador.',

/**
 * Search
 */

	'search' => "Pesquisa",
	'searchtitle' => "Pesquisar: %s",
	'users:searchtitle' => "Pesquisando utilizadores: %s",
	'groups:searchtitle' => "Pesquisando grupos: %s",
	'advancedsearchtitle' => "%s com resultados correspondentes a %s",
	'notfound' => "Não foram encontrados resultados.",
	'next' => "Seguinte",
	'previous' => "Anterior",

	'viewtype:change' => "Alterar a vista",
	'viewtype:list' => "Lista",
	'viewtype:gallery' => "Galeria",

	'tag:search:startblurb' => "Items com etiquetas correspondentes a '%s':",

	'user:search:startblurb' => "Utilizadores correspondentes a '%s':",
	'user:search:finishblurb' => "Para ver mais, clique aqui.",

	'group:search:startblurb' => "Grupos correspondentes a '%s':",
	'group:search:finishblurb' => "Para ver mais, clique aqui.",
	'search:go' => 'Ir',
	'userpicker:only_friends' => 'Só seguidos', //'Só amigos',

/**
 * Account
 */

	'account' => "Conta",
	'settings' => "Definições",
	'tools' => "Ferramentas",

	'register' => "Registar",
	'registerok' => "Registou-se com sucesso como %s.",
	'registerbad' => "O seu registo não teve sucesso por ter ocorrido um erro desconhecido.",
	'registerdisabled' => "O registo foi desativado pelo administrador do sistema",

	'registration:notemail' => 'O endereço de email fornecido não parece ser válido.',
	'registration:userexists' => 'Esse nome de utilizador já existe',
	'registration:usernametooshort' => 'O seu nome de utilizador deverá ter um mínimo de %u carateres.',
	'registration:passwordtooshort' => 'A senha deverá ter um mínimo de %u carateres.',
	'registration:dupeemail' => 'Este endereço de email já foi registado.',
	'registration:invalidchars' => 'Perdão, o campo NOME DE UTILIZADOR contém um caráter inválido %s.  Os espaços e os carateres seguintes são inválidos: %s', //vjr
	'registration:emailnotvalid' => 'O endereço de email que indicou é inválido neste sistema',
	'registration:passwordnotvalid' => 'A senha que indicou é inválida neste sistema',
	'registration:usernamenotvalid' => 'O nome de utilizador que indicou é inválido neste sistema',

	'adduser' => "Adicionar Utilizador",
	'adduser:ok' => "Adicionou com sucesso um novo utilizador.",
	'adduser:bad' => "O novo utilizador não pode ser criado.",

	'user:set:name' => "Definições do nome da conta",
	'user:name:label' => "O meu nome",
	'user:name:success' => "Alterou com sucesso o seu nome no sistema.",
	'user:name:fail' => "Não foi possível alterar o seu nome. Verifique se o nome não é demasiado longo e tente novamente.",

	'user:set:password' => "Senha da conta",
	'user:current_password:label' => 'Senha atual',
	'user:password:label' => "Nova senha",
	'user:password2:label' => "Nova senha (confirmar)",
	'user:password:success' => "Senha alterada",
	'user:password:fail' => "Não foi possível alterar a sua senha.",
	'user:password:fail:notsame' => "As duas senhas não são iguais!",
	'user:password:fail:tooshort' => "A senha é muito curta!",
	'user:password:fail:incorrect_current_password' => 'A senha atual introduzida está incorrecta.',
	'user:resetpassword:unknown_user' => 'Utilizador inválido.',
	'user:resetpassword:reset_password_confirm' => 'Reiniciar a sua senha enviar-lhe-á uma nova senha para o seu endereço de email registado.',

	'user:set:language' => "Definições de língua",
	'user:language:label' => "A sua língua",
	'user:language:success' => "As suas definições de língua foram atualizadas.",
	'user:language:fail' => "Não foi possível gravar as suas definições de língua.",

	'user:username:notfound' => 'Nome de utilizador %s não foi encontrado.',

	'user:password:lost' => 'Perdeu a senha?',
	'user:password:resetreq:success' => 'Solicitou nova senha com sucesso, email enviado',
	'user:password:resetreq:fail' => 'Não foi possível solicitar nova senha.',

	'user:password:text' => 'Para solicitar nova senha, introduza o seu nome de utilizador abaixo e clique no botão Solicitar.',

	'user:persistent' => 'Manter sessão iniciada',

	'walled_garden:welcome' => 'Bem-vindo a',

/**
 * Administration  - COMPLETAR
 */
	'menu:page:header:administer' => 'Administer',
	'menu:page:header:configure' => 'Configure',
	'menu:page:header:develop' => 'Develop',

	'admin:view_site' => 'View site',
	'admin:loggedin' => 'Logged in as %s',
	'admin:menu' => 'Menu',

	'admin:configuration:success' => "Your settings have been saved.",
	'admin:configuration:fail' => "Your settings could not be saved.",

	'admin:unknown_section' => 'Invalid Admin Section.',

	'admin' => "Administration",
	'admin:description' => "The admin panel allows you to control all aspects of the system, from user management to how plugins behave. Choose an option below to get started.",

	'admin:statistics' => "Statistics",
	'admin:statistics:overview' => 'Overview',

	'admin:appearance' => 'Appearance',
	'admin:utilities' => 'Utilities',

	'admin:users' => "Users",
	'admin:users:online' => 'Currently Online',
	'admin:users:newest' => 'Newest',
	'admin:users:add' => 'Add New User',
	'admin:users:description' => "This admin panel allows you to control user settings for your site. Choose an option below to get started.",
	'admin:users:adduser:label' => "Click here to add a new user...",
	'admin:users:opt:linktext' => "Configure users...",
	'admin:users:opt:description' => "Configure users and account information. ",
	'admin:users:find' => 'Find',

	'admin:settings' => 'Settings',
	'admin:settings:basic' => 'Basic Settings',
	'admin:settings:advanced' => 'Advanced Settings',
	'admin:site:description' => "This admin panel allows you to control global settings for your site. Choose an option below to get started.",
	'admin:site:opt:linktext' => "Configure site...",
	'admin:site:access:warning' => "Changing the access setting only affects the permissions on content created in the future.",

	'admin:dashboard' => 'Dashboard',
	'admin:widget:online_users' => 'Online users',
	'admin:widget:online_users:help' => 'Lists the users currently on the site',
	'admin:widget:new_users' => 'New users',
	'admin:widget:new_users:help' => 'Lists the newest users',
	'admin:widget:content_stats' => 'Content statistics',
	'admin:widget:content_stats:help' => 'Keep track of the content created by your users',
	'widget:content_stats:type' => 'Content type',
	'widget:content_stats:number' => 'Number',

	'admin:widget:admin_welcome' => 'Welcome',
	'admin:widget:admin_welcome:help' => "A short introduction to Elgg's admin area",
	'admin:widget:admin_welcome:intro' =>
'Welcome to Elgg! Right now you are looking at the administration dashboard. It\'s useful for tracking what\'s happening on the site.',

	'admin:widget:admin_welcome:admin_overview' =>
"Navigation for the administration area is provide by the menu to the right. It is organized into"
. " three sections:
	<dl>
		<dt>Administer</dt><dd>Everyday tasks like monitoring reported content, checking who is online, and viewing statistics.</dd>
		<dt>Configure</dt><dd>Occasional tasks like setting the site name or activating a plugin.</dd>
		<dt>Develop</dt><dd>For developers who are building plugins or designing themes. (Requires a developer plugin.)</dd>
	</dl>
	",

	// argh, this is ugly
	'admin:widget:admin_welcome:outro' => '<br />Be sure to check out the resources available through the footer links and thank you for using Elgg!',

	'admin:footer:faq' => 'Administration FAQ',
	'admin:footer:manual' => 'Administration Manual',
	'admin:footer:community_forums' => 'Elgg Community Forums',
	'admin:footer:blog' => 'Elgg Blog',

	'admin:plugins:category:all' => 'All plugins',
	'admin:plugins:category:admin' => 'Admin',
	'admin:plugins:category:bundled' => 'Bundled',
	'admin:plugins:category:content' => 'Content',
	'admin:plugins:category:development' => 'Development',
	'admin:plugins:category:extension' => 'Extensions',
	'admin:plugins:category:service' => 'Service/API',

	'admin:plugins:markdown:unknown_plugin' => 'Unknown plugin.',
	'admin:plugins:markdown:unknown_file' => 'Unknown file.',


	'admin:notices:could_not_delete' => 'Could not delete notice.',

	'admin:options' => 'Admin options',


/**
 * Plugins
 */
	'plugins:settings:save:ok' => "Settings for the %s plugin were saved successfully.",
	'plugins:settings:save:fail' => "There was a problem saving settings for the %s plugin.",
	'plugins:usersettings:save:ok' => "User settings for the %s plugin were saved successfully.",
	'plugins:usersettings:save:fail' => "There was a problem saving  user settings for the %s plugin.",
	'item:object:plugin' => 'Plugins',

	'admin:plugins' => "Plugins",
	'admin:plugins:activate_all' => 'Activate All',
	'admin:plugins:deactivate_all' => 'Deactivate All',
	'admin:plugins:description' => "This admin panel allows you to control and configure tools installed on your site.",
	'admin:plugins:opt:linktext' => "Configure tools...",
	'admin:plugins:opt:description' => "Configure the tools installed on the site. ",
	'admin:plugins:label:author' => "Author",
	'admin:plugins:label:copyright' => "Copyright",
	'admin:plugins:label:categories' => 'Categories',
	'admin:plugins:label:licence' => "Licence",
	'admin:plugins:label:website' => "URL",
	'admin:plugins:label:moreinfo' => 'more info',
	'admin:plugins:label:version' => 'Version',
	'admin:plugins:label:location' => 'Location',
	'admin:plugins:label:dependencies' => 'Dependencies',

	'admin:plugins:warning:elgg_version_unknown' => 'This plugin uses a legacy manifest file and does not specify a compatible Elgg version. It probably will not work!',
	'admin:plugins:warning:unmet_dependencies' => 'This plugin has unmet dependencies and cannot be activated. Check dependencies under more info.',
	'admin:plugins:warning:invalid' => '%s is not a valid Elgg plugin.  Check <a href="http://docs.elgg.org/Invalid_Plugin">the Elgg documentation</a> for troubleshooting tips.',
	'admin:plugins:cannot_activate' => 'cannot activate',

	'admin:plugins:set_priority:yes' => "Reordered %s.",
	'admin:plugins:set_priority:no' => "Could not reorder %s.",
	'admin:plugins:deactivate:yes' => "Deactivated %s.",
	'admin:plugins:deactivate:no' => "Could not deactivate %s.",
	'admin:plugins:activate:yes' => "Activated %s.",
	'admin:plugins:activate:no' => "Could not activate %s.",
	'admin:plugins:categories:all' => 'All categories',
	'admin:plugins:plugin_website' => 'Plugin website',
	'admin:plugins:author' => '%s',
	'admin:plugins:version' => 'Version %s',
	'admin:plugins:simple' => 'Simple',
	'admin:plugins:advanced' => 'Advanced',
	'admin:plugin_settings' => 'Plugin Settings',
	'admin:plugins:simple_simple_fail' => 'Could not save settings.',
	'admin:plugins:simple_simple_success' => 'Settings saved.',
	'admin:plugins:simple:cannot_activate' => 'Cannot activate this plugin. Check the advanced plugin admin area for more information.',

	'admin:plugins:dependencies:type' => 'Type',
	'admin:plugins:dependencies:name' => 'Name',
	'admin:plugins:dependencies:expected_value' => 'Tested Value',
	'admin:plugins:dependencies:local_value' => 'Actual value',
	'admin:plugins:dependencies:comment' => 'Comment',

	'admin:statistics:description' => "This is an overview of statistics on your site. If you need more detailed statistics, a professional administration feature is available.",
	'admin:statistics:opt:description' => "View statistical information about users and objects on your site.",
	'admin:statistics:opt:linktext' => "View statistics...",
	'admin:statistics:label:basic' => "Basic site statistics",
	'admin:statistics:label:numentities' => "Entities on site",
	'admin:statistics:label:numusers' => "Number of users",
	'admin:statistics:label:numonline' => "Number of users online",
	'admin:statistics:label:onlineusers' => "Users online now",
	'admin:statistics:label:version' => "Elgg version",
	'admin:statistics:label:version:release' => "Release",
	'admin:statistics:label:version:version' => "Version",

	'admin:user:label:search' => "Find users:",
	'admin:user:label:searchbutton' => "Search",

	'admin:user:ban:no' => "Can not ban user",
	'admin:user:ban:yes' => "User banned.",
	'admin:user:self:ban:no' => "You cannot ban yourself",
	'admin:user:unban:no' => "Can not unban user",
	'admin:user:unban:yes' => "User unbanned.",
	'admin:user:delete:no' => "Can not delete user",
	'admin:user:delete:yes' => "The user %s has been deleted",
	'admin:user:self:delete:no' => "You cannot delete yourself",

	'admin:user:resetpassword:yes' => "Password reset, user notified.",
	'admin:user:resetpassword:no' => "Password could not be reset.",

	'admin:user:makeadmin:yes' => "User is now an admin.",
	'admin:user:makeadmin:no' => "We could not make this user an admin.",

	'admin:user:removeadmin:yes' => "User is no longer an admin.",
	'admin:user:removeadmin:no' => "We could not remove administrator privileges from this user.",
	'admin:user:self:removeadmin:no' => "You cannot remove your own administrator privileges.",

	'admin:appearance:menu_items' => 'Menu Items',
	'admin:menu_items:configure' => 'Configure main menu items',
	'admin:menu_items:description' => 'Select which menu items you want to show as featured links.  Unused items will be added as "More" at the end of the list.',
	'admin:menu_items:hide_toolbar_entries' => 'Remove links from tool bar menu?',
	'admin:menu_items:saved' => 'Menu items saved.',
	'admin:add_menu_item' => 'Add a custom menu item',
	'admin:add_menu_item:description' => 'Fill out the Display name and URL to add custom items to your navigation menu.',

	'admin:appearance:default_widgets' => 'Default Widgets',
	'admin:default_widgets:unknown_type' => 'Unknown widget type',
	'admin:default_widgets:instructions' => 'Add, remove, position, and configure default widgets for the selected widget page.'
		. '  These changes will apply only to new content on the site.',

/**
 * User settings
 */
	'usersettings:description' => "O painel de definições do utilizador permite-lhe controlar todas as suas definições pessoais, desde a gestão de utilizadores até ao comportamento dos plugins. Escolha uma opção abaixo para iniciar.",

	'usersettings:statistics' => "As suas estatísticas",
	'usersettings:statistics:opt:description' => "Ver informação estatística sobre utilizadores e objetos no seu site.",
	'usersettings:statistics:opt:linktext' => "Estatísticas da conta",

	'usersettings:user' => "As suas definições",
	'usersettings:user:opt:description' => "Isto permite-lhe controlar as deinições de utilizador.",
	'usersettings:user:opt:linktext' => "Altere as suas definições",

	'usersettings:plugins' => "Ferramentas",
	'usersettings:plugins:opt:description' => "Configure as definições (se houver) para as suas ferramentas ativas.",
	'usersettings:plugins:opt:linktext' => "Configure as suas ferramentas",

	'usersettings:plugins:description' => "Este painel permite-lhe controlar e configurar as definições pessoais das ferramentas instaladas pelo administrador do sistema.",
	'usersettings:statistics:label:numentities' => "O seu conteúdo",

	'usersettings:statistics:yourdetails' => "Os seus dados",
	'usersettings:statistics:label:name' => "Nome completo",
	'usersettings:statistics:label:email' => "Email",
	'usersettings:statistics:label:membersince' => "Membro desde",
	'usersettings:statistics:label:lastlogin' => "Acedeu pela última vez",

/**
 * Activity river - COMPLETAR
 */
	'river:all' => 'Toda a Atividade do Sítio',
	'river:mine' => 'A Minha Atividade',
	'river:friends' => 'Atividade dos seguidos', //'Atividade dos Amigos',
	'river:select' => 'Mostrar %s',
	'river:comments:more' => '+%u mais',
	'river:generic_comment' => 'comentou %s %s',

	'friends:widget:description' => "Mostra alguns dos seus seguidos", //"Mostra alguns dos seus amigos.",
	'friends:num_display' => "Número de seguidos a mostrar", //"Número de amigos a mostrar",
	'friends:icon_size' => "Tamanho do ícone",
	'friends:tiny' => "mínimo",
	'friends:small' => "pequeno",

/**
 * Generic action words
 */

	'save' => "Gravar",
	'reset' => 'Reiniciar',
	'publish' => "Publicar",
	'cancel' => "Cancelar",
	'saving' => "A gravar ...",
	'update' => "Atualizar",
	'edit' => "Modificar",
	'delete' => "Apagar",
	'accept' => "Aceitar",
	'load' => "Carregar",
	'upload' => "Carregar",
	'ban' => "Banir",
	'unban' => "Desbanir",
	'banned' => "Banido",
	'enable' => "Ativar",
	'disable' => "Desativar",
	'request' => "Solicitar",
	'complete' => "Completar",
	'open' => 'Abrir',
	'close' => 'Fechar',
	'reply' => "Responder",
	'more' => 'Mais',
	'comments' => 'Comentários',
	'import' => 'Importar',
	'export' => 'Exportar',
	'untitled' => 'Sem título',
	'help' => 'Ajuda',
	'send' => 'Enviar',
	'post' => 'Enviar',
	'submit' => 'Submeter',
	'comment' => 'Comentar',
	'upgrade' => 'Atualizar',

	'site' => 'Sítio',
	'activity' => 'Atividade',
	'members' => 'Membros',

	'up' => 'Cima',
	'down' => 'Baixo',
	'top' => 'Topo',
	'bottom' => 'Fundo',

	'invite' => "Convidar",

	'resetpassword' => "Reiniciar senha",
	'makeadmin' => "Tornar administrador",
	'removeadmin' => "Remover administrador",

	'option:yes' => "Sim",
	'option:no' => "Não",

	'unknown' => 'Desconhecido',

	'active' => 'Ativos',
	'total' => 'Total',

	'learnmore' => "Clique aqui para saber mais.",

	'content' => "conteúdo",
	'content:latest' => 'Atividade recente',
	'content:latest:blurb' => 'Em alternativa, clique aqui para ver o conteúdo recente do sítio.',

	'link:text' => 'ver hiperligação',
/**
 * Generic questions
 */

	'question:areyousure' => 'Tem a certeza?',

/**
 * Generic data words
 */

	'title' => "Título",
	'description' => "Descrição",
	'tags' => "Etiquetas",
	'spotlight' => "Spotlight",
	'all' => "Tudo",
	'mine' => "Meu",

	'by' => 'por',

	'annotations' => "Anotações",
	'relationships' => "Relações",
	'metadata' => "Metadados",
	'tagcloud' => "Nuvem de etiquetas",
	'tagcloud:allsitetags' => "Todas as etiquetas do sítio",

/**
 * Entity actions
 */
	'edit:this' => 'Modificar isto',
	'delete:this' => 'Apagar isto',
	'comment:this' => 'Comentar isto',

/**
 * Input / output strings
 */

	'deleteconfirm' => "Tem a certeza que quer apagar este item?",
	'fileexists' => "Um ficheiro já foi carregado. Para o substituir, seleccione-o abaixo:",

/**
 * User add
 */

	'useradd:subject' => 'Conta de utilizador criada',
	'useradd:body' => '
%s,

Uma conta de utilizador foi criada para si em %s. Para entrar, visite:

%s

E utilize estas credenciais:

Nome de utilizador: %s
Senha: %s

Após ter entrado, recomendamos vivamente que altere a sua senha.
',

/**
 * System messages
 **/

	'systemmessages:dismiss' => "clique para retirar",


/**
 * Import / export
 */
	'importsuccess' => "Importação de dados com sucesso",
	'importfail' => "Importação de dados por OpenDD falhou.",

/**
 * Time
 */

	'friendlytime:justnow' => "mesmo agora",
	'friendlytime:minutes' => "há %s minutos",
	'friendlytime:minutes:singular' => "há um minuto",
	'friendlytime:hours' => "há %s horas",
	'friendlytime:hours:singular' => "há uma hora",
	'friendlytime:days' => "há %s dias",
	'friendlytime:days:singular' => "ontem",
	'friendlytime:date_format' => 'j F Y @ H:i',

	'date:month:01' => 'Janeiro %s',
	'date:month:02' => 'Fevereiro %s',
	'date:month:03' => 'Março %s',
	'date:month:04' => 'Abril %s',
	'date:month:05' => 'Maio %s',
	'date:month:06' => 'Junho %s',
	'date:month:07' => 'Julho %s',
	'date:month:08' => 'Agosto %s',
	'date:month:09' => 'Setembro %s',
	'date:month:10' => 'Outubro %s',
	'date:month:11' => 'Novembro %s',
	'date:month:12' => 'Dezembro %s',

/**
 * System settings - COMPLETAR
 */

	'installation:sitename' => "The name of your site:",
	'installation:sitedescription' => "Short description of your site (optional):",
	'installation:wwwroot' => "The site URL:",
	'installation:path' => "The full path of the Elgg installation:",
	'installation:dataroot' => "The full path of the data directory:",
	'installation:dataroot:warning' => "You must create this directory manually. It should be in a different directory to your Elgg installation.",
	'installation:sitepermissions' => "The default access permissions:",
	'installation:language' => "The default language for your site:",
	'installation:debug' => "Debug mode provides extra information which can be used to diagnose faults. However, it can slow your system down so should only be used if you are having problems:",
	'installation:debug:none' => 'Turn off debug mode (recommended)',
	'installation:debug:error' => 'Display only critical errors',
	'installation:debug:warning' => 'Display errors and warnings',
	'installation:debug:notice' => 'Log all errors, warnings and notices',

	// Walled Garden support
	'installation:registration:description' => 'User registration is enabled by default. Turn this off if you do not want new users to be able to register on their own.',
	'installation:registration:label' => 'Allow new users to register',
	'installation:walled_garden:description' => 'Enable the site to run as a private network. This will not allow non logged-in users to view any site pages other than those specifically marked as public.',
	'installation:walled_garden:label' => 'Restrict pages to logged-in users',

	'installation:httpslogin' => "Enable this to have user logins performed over HTTPS. You will need to have https enabled on your server for this to work.",
	'installation:httpslogin:label' => "Enable HTTPS logins",
	'installation:view' => "Enter the view which will be used as the default for your site or leave this blank for the default view (if in doubt, leave as default):",

	'installation:siteemail' => "Site email address (used when sending system emails):",

	'installation:disableapi' => "Elgg provides an API for building web services so that remote applications can interact with your site.",
	'installation:disableapi:label' => "Enable Elgg's web services API",

	'installation:allow_user_default_access:description' => "If checked, individual users will be allowed to set their own default access level that can over-ride the system default access level.",
	'installation:allow_user_default_access:label' => "Allow user default access",

	'installation:simplecache:description' => "The simple cache increases performance by caching static content including some CSS and JavaScript files. Normally you will want this on.",
	'installation:simplecache:label' => "Use simple cache (recommended)",

	'installation:viewpathcache:description' => "The view filepath cache decreases the loading times of plugins by caching the location of their views.",
	'installation:viewpathcache:label' => "Use view filepath cache (recommended)",

	'upgrading' => 'Upgrading...',
	'upgrade:db' => 'Your database was upgraded.',
	'upgrade:core' => 'Your elgg installation was upgraded.',
	'upgrade:unable_to_upgrade' => 'Unable to upgrade.',
	'upgrade:unable_to_upgrade_info' =>
		'This installation cannot be upgraded because legacy views
		were detected in the Elgg core views directory. These views have been deprecated and need to be
		removed for Elgg to function correctly. If you have not made changes to Elgg core, you can
		simply delete the views directory and replace it with the one from the latest
		package of Elgg downloaded from <a href="http://elgg.org">elgg.org</a>.<br /><br />

		If you need detailed instructions, please visit the <a href="http://docs.elgg.org/wiki/Upgrading_Elgg">
		Upgrading Elgg documentation</a>.  If you require assistance, please post to the
		<a href="http://community.elgg.org/pg/groups/discussion/">Community Support Forums</a>.',

	'update:twitter_api:deactivated' => 'Twitter API (previously Twitter Service) was deactivated during the upgrade. Please activate it manually if required.',
	'update:oauth_api:deactivated' => 'OAuth API (previously OAuth Lib) was deactivated during the upgrade.  Please activate it manually if required.',

	'deprecated:function' => '%s() was deprecated by %s()',

/**
 * Welcome
 */

	'welcome' => "Bem-vindo(a)",
	'welcome:user' => 'Bem-vindo(a) %s',

/**
 * Emails
 */
	'email:settings' => "Definições de email",
	'email:address:label' => "O seu endereço de email",

	'email:save:success' => "Novo endereço de email gravado, verificação solicitada.",
	'email:save:fail' => "Não foi possível gravar o seu novo endereço de email.",

	'friend:newfriend:subject' => "%s tornou-se seu seguidor",
	'friend:newfriend:body' => "%s tornou-se seu seguidor.

Para ver o seu perfil, clique aqui:

%s

Email gerado automaticamente, respostas não permitidas.",

	'email:resetpassword:subject' => "Reiniciar senha!",
	'email:resetpassword:body' => "Olá %s,

A sua senha foi reiniciada para: %s",

	'email:resetreq:subject' => "Pedido de nova senha.",
	'email:resetreq:body' => "Olá %s,

Alguém (do endereço IP %s) solicitou uma nova senha para a sua conta.

Se efectuou o pedido, clique na hiperligação abaixo, caso contrário ignore esta mensagem.

%s
",

/**
 * user default access  - COMPLETAR
 */

'default_access:settings' => "Your default access level",
'default_access:label' => "Default access",
'user:default_access:success' => "Your new default access level was saved.",
'user:default_access:failure' => "Your new default access level could not be saved.",

/**
 * XML-RPC - COMPLETAR
 */
	'xmlrpc:noinputdata'	=>	"Input data missing",

/**
 * Comments
 */

	'comments:count' => "%s comentários",

	'riveraction:annotation:generic_comment' => '%s comentou %s',

	'generic_comments:add' => "Deixar um comentário",
	'generic_comments:post' => "Inserir comentário",
	'generic_comments:text' => "Comentar",
	'generic_comments:latest' => "Comentários recentes",
	'generic_comment:posted' => "O seu comentário foi inserido com sucesso.",
	'generic_comment:deleted' => "O comentário foi eliminado com sucesso.",
	'generic_comment:blank' => "Deve incluir algum texto no comentário antes de o poder gravar.",
	'generic_comment:notfound' => "Não foi possível encontrar o item especificado.",
	'generic_comment:notdeleted' => "Não foi possível eliminar este comentário.",
	'generic_comment:failure' => "Um erro inesperado ocorreu ao inserir o seu comentário. Por favor tente novamente.",
	'generic_comment:none' => 'Sem comentários',

	'generic_comment:email:subject' => 'Tem um novo comentário!',
	'generic_comment:email:body' => "Tem um novo comentário no item \"%s\" por %s, que diz:


%s


Para responder ou ver o item original clique aqui:

%s

Para ver o perfil de %s, clique aqui:

%s

Não são permitidas respostas a este email.",

/**
 * Entities
 */
	'byline' => 'Por %s',
	'entity:default:strapline' => 'Criado a %s por %s',
	'entity:default:missingsupport:popup' => 'Esta entidade não pode ser mostrada corretamente. A razão poderá ser a necessidade de um plugin que já não está instalado.',

	'entity:delete:success' => 'A entidade %s foi eliminada',
	'entity:delete:fail' => 'Não foi possível eliminar a entidade %s',


/**
 * Action gatekeeper - COMPLETAR
 */
	'actiongatekeeper:missingfields' => 'Form is missing __token or __ts fields',
	'actiongatekeeper:tokeninvalid' => "We encountered an error (token mismatch). This probably means that the page you were using expired. Please try again.",
	'actiongatekeeper:timeerror' => 'The page you were using has expired. Please refresh and try again.',
	'actiongatekeeper:pluginprevents' => 'A extension has prevented this form from being submitted.',


/**
 * Word blacklists
 */
	'word:blacklist' => 'and, the, then, but, she, his, her, him, one, not, also, about, now, hence, however, still, likewise, otherwise, therefore, conversely, rather, consequently, furthermore, nevertheless, instead, meanwhile, accordingly, this, seems, what, whom, whose, whoever, whomever',

/**
 * Tag labels
 */

	'tag_names:tags' => 'Etiquetas',
	'tags:site_cloud' => 'Nuvem de Etiquetas do Sítio',

/**
 * Javascript
 */

	'js:security:token_refresh_failed' => 'Cannot contact %s. You may experience problems saving content.',
	'js:security:token_refreshed' => 'Connection to %s restored!',

/**
 * Languages according to ISO 639-1
 */
	"aa" => "Afar",
	"ab" => "Abkhazian",
	"af" => "Afrikaans",
	"am" => "Amharic",
	"ar" => "Árabe",
	"as" => "Assamese",
	"ay" => "Aymara",
	"az" => "Azerbaijani",
	"ba" => "Bashkir",
	"be" => "Bielorusso",
	"bg" => "Búlgaro",
	"bh" => "Bihari",
	"bi" => "Bislama",
	"bn" => "Bengali; Bangla",
	"bo" => "Tibetano",
	"br" => "Bretão",
	"ca" => "Catalão",
	"co" => "Corsican",
	"cs" => "Checo",
	"cy" => "Galês",
	"da" => "Dinamarquês",
	"de" => "Alemão",
	"dz" => "Bhutani",
	"el" => "Grego",
	"en" => "Inglês",
	"eo" => "Esperanto",
	"es" => "Espanhol",
	"et" => "Estónio",
	"eu" => "Basco",
	"fa" => "Persa",
	"fi" => "Finlandês",
	"fj" => "Fiji",
	"fo" => "Faeroese",
	"fr" => "Francês",
	"fy" => "Frísio",
	"ga" => "Irlandês",
	"gd" => "Scots / Gaelic",
	"gl" => "Galego",
	"gn" => "Guarani",
	"gu" => "Gujarati",
	"he" => "Hebraico",
	"ha" => "Hausa",
	"hi" => "Hindi",
	"hr" => "Croata",
	"hu" => "Húngaro",
	"hy" => "Arménio",
	"ia" => "Interlingua",
	"id" => "Indonésio",
	"ie" => "Interlingue",
	"ik" => "Inupiak",
	//"in" => "Indonesian",
	"is" => "Islandês",
	"it" => "Italiano",
	"iu" => "Inuktitut",
	"iw" => "Hebraico (obsoleto)",
	"ja" => "Japonês",
	"ji" => "Yiddish (obsoleto)",
	"jw" => "Javanês",
	"ka" => "Georgiano",
	"kk" => "Cazaque",
	"kl" => "Gronelandês",
	"km" => "Cambodjano",
	"kn" => "Kannada",
	"ko" => "Coreano",
	"ks" => "Kashmiri",
	"ku" => "Curdo",
	"ky" => "Quirguize",
	"la" => "Latim",
	"ln" => "Lingala",
	"lo" => "Laothian",
	"lt" => "Lituano",
	"lv" => "Letão",
	"mg" => "Malgaxe",
	"mi" => "Maori",
	"mk" => "Macedónio",
	"ml" => "Malayalam",
	"mn" => "Mongol",
	"mo" => "Moldavo",
	"mr" => "Marathi",
	"ms" => "Malaio",
	"mt" => "Maltês",
	"my" => "Birmanês",
	"na" => "Nauru",
	"ne" => "Nepali",
	"nl" => "Holandês",
	"no" => "Norueguês",
	"oc" => "Occitano",
	"om" => "(Afan) Oromo",
	"or" => "Oriya",
	"pa" => "Punjabi",
	"pl" => "Polaco",
	"ps" => "Pashto / Pushto",
	"pt" => "Português",
	"qu" => "Quechua",
	"rm" => "Rhaeto-Romance",
	"rn" => "Kirundi",
	"ro" => "Romeno",
	"ru" => "Russo",
	"rw" => "Kinyarwanda",
	"sa" => "Sânscrito",
	"sd" => "Sindhi",
	"sg" => "Sangro",
	"sh" => "Servo-Croata",
	"si" => "Cingalês",
	"sk" => "Eslovaco",
	"sl" => "Esloveno",
	"sm" => "Samoano",
	"sn" => "Shona",
	"so" => "Somali",
	"sq" => "Albanês",
	"sr" => "Sérvio",
	"ss" => "Siswati",
	"st" => "Sesotho",
	"su" => "Sundanese",
	"sv" => "Sueco",
	"sw" => "Swahili",
	"ta" => "Tamil",
	"te" => "Tegulu",
	"tg" => "Tajique",
	"th" => "Tailandês",
	"ti" => "Tigrinya",
	"tk" => "Turquemeno",
	"tl" => "Tagalog",
	"tn" => "Setswana",
	"to" => "Tonga",
	"tr" => "Turco",
	"ts" => "Tsonga",
	"tt" => "Tatar",
	"tw" => "Twi",
	"ug" => "Uigur",
	"uk" => "Ucraniano",
	"ur" => "Urdu",
	"uz" => "Uzbeque",
	"vi" => "Vietnamita",
	"vo" => "Volapuk",
	"wo" => "Wolof",
	"xh" => "Xhosa",
	//"y" => "Yiddish",
	"yi" => "Yiddish",
	"yo" => "Yoruba",
	"za" => "Zuang",
	"zh" => "Chinês",
	"zu" => "Zulu",
);

add_translation("pt",$portugues);
