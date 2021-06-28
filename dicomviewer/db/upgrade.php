<?php


/**
 * Mise à jour du plugin de la db
 *
 * @package     mod_dicomviewer
 * @category    upgrade
 * @copyright   2021 | Stage DUT AS Informatique
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Met a jour la base de donnee
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_dicomviewer_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();

    return true;
}
