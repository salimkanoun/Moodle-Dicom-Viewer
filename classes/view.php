<?php

/**
 * Classe formulaire de view
 *
 * @package     mod_dicomviewer
 * @copyright   2021 | Stage DUT AS Informatique
 */

//moodleform (bibliotheque formulaire)
require_once("$CFG->libdir/formslib.php");
 
class viewForm extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG;
 
        $mform = $this->_form; // Attention underscore
 
        //Message a afficher
        $attributs = 'size="80"';
        $mform->addElement('checkbox', 'viewerOWV', 'Osimis Web Viewer', $attributs); // Ajour élément dans le formulaire
        $mform->addElement('checkbox', 'viewerSWV', 'Stone Web Viewer', $attributs); // Ajour élément dans le formulaire
        $this->add_action_buttons();


    }
    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}