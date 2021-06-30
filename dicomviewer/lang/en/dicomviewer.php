<?php

/**
 * Chaine de caractere du plugin EN définit ici
 *
 * @package     mod_dicomviewer
 * @category    string
 * @copyright   2021 | Stage DUT AS Informatique
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Viewer DICOM image';
$string['modulename'] = 'Viewer DICOM image';
$string['modulename_help'] = 'need a description';
$string['dicomviewername'] = 'Name of activity';
$string['dicomviewerfieldset'] = 'Set of fields';
$string['dicomviewer:view'] = 'Viewing an instance of the dicomviewer plugin in a course';
$string['dicomviewer:addinstance'] = 'Create a dicom viewer instance in a course';


//String des viewer
$string['ohif'] = './viewer-ohif/{$a}';
$string['stoneviewer'] = './viewer-stone/index.html?study={$a}';

//String du mustache view.php
$string['choiceviewer'] = 'Choose the viewer';

//String settings.php
$string['cancelForm'] = 'You canceled the Dicom Viewer activity plugin configuration form';
$string['validateForm'] = 'Configuration saved successfully';
$string['titlestone'] = 'Stone Web Viewer';
$string['titleohif'] = 'OHIF Viewer';
$string['titledesc'] = 'Configuration parameters of DICOM Viewer';
    //Stone
    $string['title_expected'] = 'Expected origin message';
    $string['title_expected_help'] = 'The allowed origin for messages corresponding to dynamic actions
         * triggered by another Web page using "window.postMessage()"';

    $string['title_dicomweb'] = 'Dicom web root';
    $string['title_dicomweb_help'] = 'Root path of the DICOMweb server.';

    //Ohif
    $string['title_wadoUriRoot'] = 'Wado Uri Root';
    $string['title_wadoUriRoot_help'] = ' .. ';
    $string['title_qidoRoot'] = 'Qido Root';
    $string['title_qidoRoot_help'] = ' .. ';
    $string['title_wadoRoot'] = 'Wado Root';
    $string['title_wadoRoot_help'] = ' .. ';
$string['invalid_param'] = 'Invalid parameter or empty field';



