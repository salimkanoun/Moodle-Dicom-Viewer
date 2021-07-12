<?php
/**
 * Page d'administration
 *
 * @package     mod_dicomviewer
 * @category    admin
 * @license     GNU General Public License
 * @copyright   2021 | Stage DUT AS Informatique
 */

require(__DIR__.'/../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once($CFG->dirroot . '/mod/dicomviewer/classes/form/config.php');

// Allow searching by setting when providing parameter directly.
$search = optional_param('search', '', PARAM_TEXT);

admin_externalpage_setup('externalconfig', '', ['search' => $search], '', ['pagelayout' => 'report']);


$formulaire = new form_config();
//Processus du formulaire
if ($formulaire->is_cancelled()) {
    redirect($CFG->wwwwroot . '/moodle/admin/search.php#linkmodules', get_string('cancelForm', 'dicomviewer'), null, \core\output\notification::NOTIFY_WARNING);

} else if ($fromform = $formulaire->get_data()) {
    //redirect($CFG->wwwwroot . '/moodle/mod/dicomviewer/config.php', get_string('validateForm', 'dicomviewer'));
    \core\notification::success(get_string('validateForm', 'dicomviewer'), $type);
} 


echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('titledesc', 'dicomviewer'));

$formulaire->display();

echo $OUTPUT->footer();