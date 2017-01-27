<?php // $Id: block_colibri.php,v 1.0 2010/02/24 jcoelho Exp $

///////////////////////////////////////////////////////////////////////////
//  Bloco Colibri
///////////////////////////////////////////////////////////////////////////
//  Este bloco destina-se a fazer ligações directas do Moodle a 
//  uma sala Colibri. A sala tem de ser criada em http://colibri.fccn.pt
//  e criada uma instância deste bloco no Moodle com os dados do Colibri
///////////////////////////////////////////////////////////////////////////
//  Processo: 
//  1. Professor entra no colibri e cria uma sessão, obtendo:
//     SID - número da sessão
//     MPIN - pin de moderação
//  1. (alternativo) É pedido à FCCN uma sala permanente, sendo enviado
//     à instituição os mesmos dados, SID e MPIN. 
//  2. Professor no Moodle da instituição, cria uma instância deste bloco,
//     onde coloca na configuração da instância o SID e MPIN
//  3. O bloco apresenta uma ligação para a URL de acesso directo, com as
//     seguintes variáveis: 
//     SID - número da sessão; 
//     ID - identificador do utilizador (no Moodle); 
//     USER - nome do utilizador (no Moodle);
//     TIME - UNIXTIME do servidor Moodle 
//     KEY - chave para confirmar a validade da ligação
//  KEY = md5([block_colibripassword] + "-" + MPIN + "-" + SID + "-" + 
//        USER + "-" + ID + "-" + UNIXTIME+3600
//  4. O acesso directo do Colibri aceitará o pedido e colocará o 
//     utilizador na sala se:
//     - a diferença entre o UNIXTIME do Colibri e UNIXTIME da URL, for
//       menor que 3600 
//     - o código construído é igual (não passa [block_colibripassword] nem MPID)
//  Este sistema permite garantir que:
//  - de outros servidores Moodle, sem o [block_colibripassword], não serão
//    aceites pedidos
//  - um outro professor do servidor Moodle, sem o MPIN, não conseguirá obter
//    um acesso válido
//  - a ligação foi construída no máximo com 1 hora de diferença
//  - a identificação do utilizador na sala, é a mesma que no Moodle (ID/USER)
///////////////////////////////////////////////////////////////////////////


class block_colibri extends block_base {

    function init() {
	$this->title = 'Colibri';
        $this->content_type = BLOCK_TYPE_TEXT;
    }
    
    function instance_allow_config() {
        return true;
    }

    function has_config() {
        return true;
    }
    
    function instance_allow_multiple() {
        return true;
    }

    // função que retorna informação (no html) da sessão colibri configurada    
    function sessao_colibri($INFO) {
        global $CFG;
        
        $unixtime=time();
        
        $output = '<script type="text/javascript" src="';
        $output .= $CFG->block_colibriurl.'?INFO='.$INFO;
        $output .= '&SID='.$this->config->SID;
        $output .= '&TIME='.$unixtime;
        
        $codigo = $CFG->block_colibripassword.'-';
        $codigo .= $this->config->MPIN.'-';
        $codigo .= $this->config->SID.'-';
        $codigo .= $INFO.'-';
        $codigo .= $unixtime;
        
        $output .= '&KEY='.hash('md5',$codigo).'"></script>';

        return $output;
    }

    function get_content() {
        global $CFG, $USER;
       
        $output=''; 
        
        // É necessário estar definida a url e SID para aparecer o formulário
        if(!empty($CFG->block_colibriurl) && !empty($this->config->SID) && !empty($USER->id)) {
            $this->title = $this->config->titulo;
            
            $unixtime=time(); 
            
            $output .= '<center><p>'.$this->config->descricao.'</p>';
            $output .= '<img src="'.$CFG->wwwroot.'/blocks/colibri/colibri.PNG"/>';
            
            // informação vinda da sessão do colibri
//            $output .= '<br/>'.$this->sessao_colibri('Pedido de informação teste');
            
            $output .= '<form action="'.$CFG->block_colibriurl.'" method="get" target="_blank">';
            $output .= '<input type="hidden" name="SID" value="'.$this->config->SID.'"/>';
            $output .= '<input type="hidden" name="ID" value="'.$USER->id.'"/>';
            $output .= '<input type="hidden" name="USER" value="'.$USER->firstname.' '.$USER->lastname.'"/>';
            $output .= '<input type="hidden" name="TIME" value="'.$unixtime.'"/>';
            
            $codigo = $CFG->block_colibripassword.'-';
            $codigo .= $this->config->MPIN.'-';
            $codigo .= $this->config->SID.'-';
            $codigo .= $USER->firstname.' '.$USER->lastname.'-';
            $codigo .= $USER->id.'-';
            $codigo .= $unixtime;

            $output .= '<input type="hidden" name="KEY" value="'.hash('md5',$codigo).'"/>';
 
            $output .= '<input type="submit" value="Entrar"/></form></center>';
        }

        $this->content->text = $output;
        $this->content->footer = '';
        
        return $this->content;
    }       
}
?>
