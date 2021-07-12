<?php
/**
 * Chaine de caractere du plugin FR définit ici
 *
 * @package     mod_dicomviewer
 * @category    admin
 * @license     GNU General Public License
 * @copyright   2021 | Stage DUT AS Informatique
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Viewer DICOM Image';
$string['modulename'] = 'Viewer DICOM Image';
$string['modulename_help'] = 'L\'activité Dicom Viewer permet à un enseignant de créer une ressource dans le but de visualiser une study DICOM. L\'activité sera alors composé des différents visualisateurs de study DICOM.

Actuellement Viewer Dicom possèdent deux visualisateurs:

* Stone Web Viewer - Orthanc
* Open Health Imaging Foundation

Pour plus d\'informations sur la configuration des visualisateurs voir la documentation et votre administrateur moodle.';
$string['modulename_link'] = '';
$string['modulenameplural'] = 'Viewer DICOM Image';
$string['dicomviewername'] = 'Nom de l\'activité';
$string['dicomviewerfieldset'] = 'Ensemble des champs';
$string['dicomviewer:view'] = 'Visionner une instance du plugin dicomviewer dans un cours';
$string['dicomviewer:addinstance'] = 'Créer une instance de dicom viewer dans un cours';

//String des viewer
$string['ohif'] = './viewer-ohif/viewer/{$a}';
$string['stoneviewer'] = './viewer-stone/index.html?study={$a}';

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
    $string['title_wadoUriRoot_help'] = 'Adresse pour WadoUriRoot';
    $string['title_qidoRoot'] = 'Qido Root';
    $string['title_qidoRoot_help'] = 'Adresse pour QidoRoot';
    $string['title_wadoRoot'] = 'Wado Root';
    $string['title_wadoRoot_help'] = 'Adresse pour WadoRoot';
$string['invalid_param'] = 'Paramètre invalide ou champ vide';