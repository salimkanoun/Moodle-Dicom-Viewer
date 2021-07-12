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
 * Formulaire de configuration minimal de discom viewer
 *
 * @package     mod_dicomviewer
 * @category    admin
 * @license     GNU General Public License
 * @copyright   2021 | Stage DUT AS Informatique
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');

/**
 * Formulaire de paramètre d'instance du module
 *
 * @package     mod_dicomviewer
 * @copyright   2021 | Stage DUT AS Informatique
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_dicomviewer_mod_form extends moodleform_mod {

    /**
     * Definie les élements
     */
    public function definition() {
        global $CFG;

        $mform = $this->_form;

        //Ajout de general.
        $mform->addElement('header', 'general', get_string('general', 'form'));

        //Ajout du nom.
        $mform->addElement('text', 'name', get_string('dicomviewername', 'mod_dicomviewer'), array('size' => '64'));

        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEANHTML);
        }

        //Bouton du nom.
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
        $mform->addHelpButton('name', 'dicomviewername', 'mod_dicomviewer');

        //Bouton de l'instance UID.
        $mform->addElement('text', 'studyinstance', 'Study Instance UID', array('size' => '64'));
        $mform->addRule('studyinstance', null, 'required', null, 'client');
        $mform->addRule('studyinstance', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
        $mform->addHelpButton('studyinstance', 'dicomviewername', 'mod_dicomviewer');
        
        //Ajout de intro et introformat.
        if ($CFG->branch >= 29) {
            $this->standard_intro_elements();
        } else {
            $this->add_intro_editor();
        }

        //Ajout du reste des paramètres.

        //Ajout des éléments standards.
        $this->standard_coursemodule_elements();

        //Ajout du bouton d'action.
        $this->add_action_buttons();
    }
}