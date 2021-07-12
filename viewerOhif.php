<?php
/**
 * Affichage de la vue d'un viewer choisi
 *
 * @package     mod_dicomviewer
 * @category    admin
 * @license     GNU General Public License
 * @copyright   2021 | Stage DUT AS Informatique
 */

require(__DIR__.'/../../config.php');
require_once(__DIR__.'/lib.php');

// Id du module de cours
$id = optional_param('id', 0, PARAM_INT);

// Id de l'activité
$d = optional_param('d', 0, PARAM_INT);

if ($id) {
    $cm = get_coursemodule_from_id('dicomviewer', $id, 0, false, MUST_EXIST);
    $course = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $moduleinstance = $DB->get_record('dicomviewer', array('id' => $cm->instance), '*', MUST_EXIST);
} else {
    $moduleinstance = $DB->get_record('dicomviewer', array('id' => $d), '*', MUST_EXIST);
    $course = $DB->get_record('course', array('id' => $moduleinstance->course), '*', MUST_EXIST);
    $cm = get_coursemodule_from_instance('dicomviewer', $moduleinstance->id, $course->id, false, MUST_EXIST);
}
 
require_login($course, true, $cm);

$modulecontext = context_module::instance($cm->id);

$PAGE->set_url('/mod/dicomviewer/viewerOhif.php', array('id' => $cm->id));
$PAGE->set_title(format_string($moduleinstance->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($modulecontext);

echo $OUTPUT->header();

$urlViewer = get_string('ohif', 'mod_dicomviewer', $moduleinstance->studyinstance);
$name = "OHIF Web Viewer";

$templateContexte = (object)[
    'nameAttribut'=>"src",
	'urlViewer'=>$urlViewer,
	'name'=>$name
];

echo $OUTPUT->render_from_template('mod_dicomviewer/viewerWeb', $templateContexte);

echo $OUTPUT->footer();