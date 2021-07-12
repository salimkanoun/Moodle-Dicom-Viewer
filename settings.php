<?php
/**
 * Page d'administration
 *
 * @package     mod_dicomviewer
 * @category    admin
 * @license     GNU General Public License
 * @copyright   2021 | Stage DUT AS Informatique
 */

defined('MOODLE_INTERNAL') || die();

//Config external
if ($hassiteconfig) {
        $ADMIN->add('modsettings', new admin_externalpage('externalconfig', get_string('pluginname', 'dicomviewer'), "$CFG->wwwroot/mod/dicomviewer/config.php"));
        // no report settings
        $settings = null;
}