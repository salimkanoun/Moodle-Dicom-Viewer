<?php 
/**
 * Classe formulaire de config
 * 
 * @package     mod_dicomviewer
 * @copyright   2021 | Stage DUT AS Informatique
 */

defined('MOODLE_INTERNAL') || die();

//moodleform (bibliotheque formulaire)
require_once("$CFG->libdir/formslib.php");
 
class form_config extends moodleform{

	public function definition(){
		global $CFG;
 		
		//Recuperation des champs de configuration
		$dataJson = json_decode(file_get_contents('configuration_viewer.json'), true);


        $mform = $this->_form; // Instancie un formulaire

        //Taille des champs de saisie
        $attributs = array('size'=>'80');

        $mform->addElement('header', 'headerstone', get_string('titlestone', 'dicomviewer'));

        addElementClassicOnForm($mform, 'title_expected', 'stone_expectedorigin', $dataJson['ExpectedMessageOrigin'], $attributs);
        addElementClassicOnForm($mform, 'title_dicomweb', 'stone_dicomwebroot', $dataJson['DicomWebRoot'], $attributs);

        $mform->addElement('header', 'headerohif', get_string('titleohif', 'dicomviewer'));

        addElementClassicOnForm($mform, 'title_wadoUriRoot', 'ohif_wadoUriRoot', $dataJson['wadoUriRoot'], $attributs);
        addElementClassicOnForm($mform, 'title_qidoRoot', 'ohif_qidoRoot', $dataJson['qidoRoot'], $attributs);
        addElementClassicOnForm($mform, 'title_wadoRoot', 'ohif_wadoRoot', $dataJson['wadoRoot'], $attributs);
       

        $this->add_action_buttons();

	}

	function validation($data, $files) {

        $arrayEmpty = false;
        foreach($data as $value){
            if(empty($value)){
                $arrayEmpty = true;
            }
        }

        if(!$arrayEmpty){
            //Remplacement dans le fichier app-config.js de ohif
            $dataConfigJsonDefault = json_decode(file_get_contents('configuration_viewer.json'), true);
            $dataJsonOhif = file_get_contents('viewer-ohif/app-config.js');
            $oldElementOhif = array(
                'wadoUriRoot: "'.$dataConfigJsonDefault['wadoUriRoot'], 
                'qidoRoot: "'.$dataConfigJsonDefault['qidoRoot'], 
                'wadoRoot: "'.$dataConfigJsonDefault['wadoRoot']
            );
            $newElementOhif = array(
                'wadoUriRoot: "'.$data['ohif_wadoUriRoot'], 
                'qidoRoot: "'.$data['ohif_qidoRoot'], 
                'wadoRoot: "'.$data['ohif_wadoRoot']
            );
            $dataJsonOhif = str_replace($oldElementOhif, $newElementOhif, $dataJsonOhif);
            file_put_contents('viewer-ohif/app-config.js', $dataJsonOhif);

            //Remplacement dans le fichier de configuration des viewer
            $jsonData = array(
                "ExpectedMessageOrigin"=>$data['stone_expectedorigin'],
                "DicomWebRoot"=>$data['stone_dicomwebroot'],
                "wadoUriRoot"=>$data['ohif_wadoUriRoot'],
                "qidoRoot"=>$data['ohif_qidoRoot'],
                "wadoRoot"=>$data['ohif_wadoRoot']
            );
            file_put_contents("configuration_viewer.json", json_encode($jsonData)); 

            //Ecriture du fichier configuration.json de stone
            $dataJsonStone = json_decode(file_get_contents('viewer-stone/configuration.json'), true);
            $dataJsonStone['StoneWebViewer']['ExpectedMessageOrigin'] = $data['stone_expectedorigin'];
            $dataJsonStone['StoneWebViewer']['DicomWebRoot'] = $data['stone_dicomwebroot'];
            file_put_contents("viewer-stone/configuration.json", json_encode($dataJsonStone)); 
        }
    
        return array();
    }

}

function addElementClassicOnForm($mform, $string_title, $string_name, $defaultValue, $attributs){

        // Ajour élément dans le formulaire
        $mform->addElement('text', $string_name, get_string($string_title, 'dicomviewer'), $attributs);
        //Définit le type de l'élement
        $mform->setType($string_name, PARAM_TEXT);   
        //Element a coté du bouton help, string dans lang du titre et de help, fichier du lang
        $mform->addHelpButton($string_name, $string_title, 'dicomviewer');
        //Valeur par défaut
        $mform->setDefault($string_name, $defaultValue);
        //Element a coté, string de l'erreur, le type du role, reinitialiser a sa valeur origine ?, false
        $mform->addRule($string_name, get_string('invalid_param', 'dicomviewer'), 'required', true, false);
        return true;
    }


