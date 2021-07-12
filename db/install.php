<?php
/**
 * Le code à exécuter après l'installation du schéma de base de données du plugin
 *
 * @package     mod_dicomviewer
 * @category    admin
 * @license     GNU General Public License
 * @copyright   2021 | Stage DUT AS Informatique
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Code a executé lors de l'installation du plugin
 */
function xmldb_dicomviewer_install() {
    return true;
}