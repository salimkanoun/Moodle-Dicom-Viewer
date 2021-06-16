<?php


/**
 * Librairie d'interface des fonctions
 *
 * @package     mod_dicomviewer
 * @copyright   2021 | Stage DUT AS Informatique
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Retourne si le plugin supporte les fonctionnalités
 *
 * @param string $feature Constante fonctionnalités.
 * @return true | null True si c'est supportés ou non.
 */
function dicomviewer_supports($feature) {
    switch ($feature) {
        case FEATURE_MOD_INTRO:
            return true;
        default:
            return null;
    }
}

/**
 * Sauvegarde une instance dans la base de données du module discomviewer
 *
 * @param object $moduleinstance Un objet from de form.
 * @param mod_dicomviewer_mod_form $mform form.
 * @return int id de la nouvelle instance.
 */
function dicomviewer_add_instance($moduleinstance, $mform = null) {
    global $DB;

    $moduleinstance->timecreated = time();

    $id = $DB->insert_record('dicomviewer', $moduleinstance);

    return $id;
}

/**
 * Met à jour une instance dans la base de données du module discomviewer
 *
 * @param object $moduleinstance Un objet from de form.
 * @param mod_dicomviewer_mod_form $mform form.
 * @return bool True si succès.
 */
function dicomviewer_update_instance($moduleinstance, $mform = null) {
    global $DB;

    $moduleinstance->timemodified = time();
    $moduleinstance->id = $moduleinstance->instance;

    return $DB->update_record('dicomviewer', $moduleinstance);
}

/**
 * Supprime une instance dans la base de données du module discomviewer
 *
 * @param int $id Id de l'instance du module.
 * @return bool True si succès.
 */
function dicomviewer_delete_instance($id) {
    global $DB;

    $exists = $DB->get_record('dicomviewer', array('id' => $id));
    if (!$exists) {
        return false;
    }

    $DB->delete_records('dicomviewer', array('id' => $id));

    return true;
}

/**
 * Etend la navigation globale en ajoutant un noeud
 *
 * @param navigation_node $dicomviewernode Un objet représentant le noeud de navigation.
 * @param stdClass $course
 * @param stdClass $module
 * @param cm_info $cm
 */
function dicomviewer_extend_navigation($dicomviewernode, $course, $module, $cm) {
}

/**
 * Étend la navigation dans les paramètres avec les paramètres 
 *
 * @param settings_navigation $settingsnav {@see settings_navigation}
 * @param navigation_node $dicomviewernode {@see navigation_node}
 */
function dicomviewer_extend_settings_navigation($settingsnav, $dicomviewernode = null) {
}
