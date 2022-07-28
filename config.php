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
 * Page d'administration
 *
 * @package     mod_dicomviewer
 * @category    admin
 * @license     GNU General Public License
 * @copyright   2021 | Stage DUT AS Informatique
 */

require(__DIR__.'/../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once($CFG->dirroot . '/mod/dicomviewer/lib.php');

use \mod_dicomviewer\form\config;

// Allow searching by setting when providing parameter directly.
$search = optional_param('search', '', PARAM_TEXT);

admin_externalpage_setup('externalconfig', '', ['search' => $search], '', ['pagelayout' => 'report']);


$formulaire = new config();
// Processus du formulaire.
if ($formulaire->is_cancelled()) {
    redirect($CFG->wwwwroot . '/moodle/admin/search.php#linkmodules', get_string('cancelForm', 'dicomviewer'),
            null, \core\output\notification::NOTIFY_WARNING);

} else if ($fromform = $formulaire->get_data()) {
    \core\notification::success(get_string('validateForm', 'dicomviewer'), $type);
}

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('titledesc', 'dicomviewer'));

$formulaire->display();

echo $OUTPUT->footer();
