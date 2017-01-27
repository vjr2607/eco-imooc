<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Defines the form for editing Quiz results block instances.
 *
 * @package   moodlecore
 * @copyright 2009 Tim Hunt
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


/**
 * Form for editing Quiz results block instances.
 *
 * @copyright 2009 Tim Hunt
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_colibri_edit_form extends block_edit_form {
    protected function specific_definition($mform) {

        $mform->addElement('header', 'configheader', 'Configuracoes Colibri');


        $mform->addElement('text', 'config_SID', 'Numero da sessao:');
        $mform->setDefault('config_SID', '');
        $mform->setType('config_SID', PARAM_MULTILANG);

        $mform->addElement('text', 'config_MPIN', 'PIN de moderacao:');
        $mform->setDefault('config_MPIN', '');
        $mform->setType('config_MPIN', PARAM_MULTILANG);


        $mform->addElement('text', 'config_titulo', 'Titulo:');
        $mform->setDefault('config_titulo', '');
        $mform->setType('config_titulo', PARAM_MULTILANG);

        $mform->addElement('text', 'config_descricao', 'Descricao:');
        $mform->setDefault('config_descricao', '');
        $mform->setType('config_descricao', PARAM_MULTILANG);

/*

Para criar uma sala Colibri, tem de ir a http://colibri.fccn.pt. Apóriar a sala, coloque aqui a  seguinte informaç:

Nú da sessã (SID)
PIN de moderaç: (MPIN)
Tílo: (titulo) [texto a apresentar no cabeçho do bloco]
Descriç: (descricao) [texto a apresentar no corpo do bloco]



*/
    }
}
