<?php
/**
 * Affichage de la vue principale du plugin
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

$PAGE->set_url('/mod/dicomviewer/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($moduleinstance->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($modulecontext);


echo $OUTPUT->header();

$templateContexte = (object)[
    'choiceviewer'=>get_string('choiceviewer', 'mod_dicomviewer'),
    'description'=>$moduleinstance->intro,
    'urlViewerOhif'=> new moodle_url('/mod/dicomviewer/viewerOhif.php', array('id'=>$cm->id)),
    'urlViewerStone'=> new moodle_url('/mod/dicomviewer/viewerStone.php', array('id'=>$cm->id)),
    'studyinstance' => $moduleinstance->studyinstance
];
echo $OUTPUT->render_from_template('mod_dicomviewer/view', $templateContexte);

echo $OUTPUT->footer();