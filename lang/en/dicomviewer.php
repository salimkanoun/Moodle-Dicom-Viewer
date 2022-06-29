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
 * Chaine de caractere du plugin EN définit ici
 *
 * @package     mod_dicomviewer
 * @category    admin
 * @license     GNU General Public License
 * @copyright   2021 | Stage DUT AS Informatique
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Viewer DICOM Image';
$string['modulename'] = 'Viewer DICOM Image';
$string['modulename_help'] = 'The Dicom Viewer activity allows a teacher to create a resource in order to view a DICOM study. The activity will then be composed of the different viewers of DICOM study.

Viewer Dicom has two viewers:

* Stone Web Viewer - Orthanc
* Open Health Imaging Foundation

For more information on configuring viewers see the documentation and your moodle administrator.';
$string['modulename_link'] = '';
$string['modulenameplural'] = 'Viewer DICOM Image';
$string['dicomviewername'] = 'Name of activity';
$string['dicomviewerfieldset'] = 'Set of fields';
$string['dicomviewer:view'] = 'Viewing an instance of the dicomviewer plugin in a course';
$string['dicomviewer:addinstance'] = 'Create a dicom viewer instance in a course';
$string['pluginadministration'] = 'Dicomviewer Administration';

// String des viewer.
$string['ohif'] = './viewer-ohif/viewer/{$a}';
$string['stoneviewer'] = './viewer-stone/index.html?study={$a}';

// String du mustache view.php.
$string['choiceviewer'] = 'Choose the viewer';

// String settings.php.
$string['cancelForm'] = 'You canceled the Dicom Viewer activity plugin configuration form';
$string['validateForm'] = 'Configuration saved successfully';
$string['titlestone'] = 'Stone Web Viewer';
$string['titleohif'] = 'OHIF Viewer';
$string['titledesc'] = 'Configuration parameters of DICOM Viewer';
    // Stone.
    $string['title_expected'] = 'Expected origin message';
    $string['title_expected_help'] = 'The allowed origin for messages corresponding to dynamic actions
         * triggered by another Web page using "window.postMessage()"';

    $string['title_dicomweb'] = 'Dicom web root';
    $string['title_dicomweb_help'] = 'Root path of the DICOMweb server.';

    // Ohif.
    $string['title_wadoUriRoot'] = 'Wado Uri Root';
    $string['title_wadoUriRoot_help'] = 'Address for WadoUriRoot';
    $string['title_qidoRoot'] = 'Qido Root';
    $string['title_qidoRoot_help'] = 'Address for QidoRoot';
    $string['title_wadoRoot'] = 'Wado Root';
    $string['title_wadoRoot_help'] = 'Address for WadoRoot';
$string['invalid_param'] = 'Invalid parameter or empty field';

// String provider.php.
$string['privacy:metadata'] = 'dicomviewer don\'t use users data. It just display medical imagery';
