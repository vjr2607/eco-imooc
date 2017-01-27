<?php  // $Id: block_colibri.php,v 1.0 2010/02/24 jcoelho Exp $

$settings->add(new admin_setting_configtext(
    'block_colibriurl', 
    'Acesso Directo Colibri',
    'URL que recebe o formulário com o acesso directo colibri. Caso não funcione, contacte a FCCN.', 
    'http://webconference.fccn.pt/colibri/direct_access.jsp', 
    PARAM_URL));
    
$settings->add(new admin_setting_configtext(
    'block_colibripassword', 
    'Password',
    'Password utilizada para encriptar a informação. Não divulgar esta password pelos utilizadores. Se a password ficar compromentida, contactar a FCCN.', 
    'colocar password de instituicao', 
    PARAM_TEXT));

?>
