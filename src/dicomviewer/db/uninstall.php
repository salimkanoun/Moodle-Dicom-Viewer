<?php


/**
 * Code exécuté avant que les tables et les données ne soient supprimées lors de la désinstallation du plug-in.
 *
 * @package     mod_dicomviewer
 * @category    upgrade
 * @copyright   2021 | Stage DUT AS Informatique
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Procedure de désinstallation
 */
function xmldb_dicomviewer_uninstall() {

    return true;
}
