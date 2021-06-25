<?php

/**
 * Chaine de caractere du plugin FR définit ici
 *
 * @package     mod_dicomviewer
 * @category    string
 * @copyright   2021 | Stage DUT AS Informatique
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Viewer DICOM image';
$string['modulename'] = 'Viewer DICOM image';
$string['modulename_help'] = 'need a description';
$string['dicomviewername'] = 'Nom de l\'activité';
$string['dicomviewerfieldset'] = 'Ensemble des champs';

//String des viewer
$string['ohif'] = new moodle_url('/mod/dicomviewer/viewer-ohif/').'{$a}';
$string['stoneviewer'] = new moodle_url('/mod/dicomviewer/viewer-stone/index.html').'?study={$a}';

//String du mustache view.php
$string['choiceviewer'] = 'Choisir un viewer';

//String settings.php
$string['cancelForm'] = 'Vous avez annulé le formulaire de configuration du plug-in d\'activité Dicom Viewer';
$string['validateForm'] = 'Configuration enregistrée avec succès';
$string['titlestone'] = 'Stone Web Viewer';
$string['titleohif'] = 'OHIF Viewer';
$string['titledesc'] = 'Paramètres de configuration de DICOM Viewer';
    //Stone
    $string['title_expected'] = 'Expected Message Origin';
    $string['title_expected_help'] = 'L\'origine autorisée des messages correspondant aux actions dynamiques
         * déclenché par une autre page Web utilisant "window.postMessage()"';

    $string['title_dicomweb'] = 'Dicom web root';
    $string['title_dicomweb_help'] = 'Chemin racine du serveur DICOMweb.';

    //Ohif
    $string['title_wadoUriRoot'] = 'Wado Uri Root';
    $string['title_wadoUriRoot_help'] = ' .. ';
    $string['title_qidoRoot'] = 'Qido Root';
    $string['title_qidoRoot_help'] = ' .. ';
    $string['title_wadoRoot'] = 'Wado Root';
    $string['title_wadoRoot_help'] = ' .. ';
$string['invalid_param'] = 'Paramètre invalide ou champ vide';



