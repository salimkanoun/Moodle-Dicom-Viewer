<?php 
/**
 * Classe formulaire de config
 * 
 * @package     mod_dicomviewer
 * @category    admin
 * @license     GNU General Public License
 * @copyright   2021 | Stage DUT AS Informatique
 */

defined('MOODLE_INTERNAL') || die();

//moodleform (bibliotheque formulaire)
require_once("$CFG->libdir/formslib.php");
 
class form_config extends moodleform{

    /**
     * Add elements to the form
     */
	public function definition(){
		global $CFG;
 		
		//Recuperation des champs de configuration
		$dataJsonStone = json_decode(file_get_contents('viewer-stone/configuration.json'), true);
        $dataJsonOhif = json_decode(file_get_contents('viewer-ohif/configuration.json'), true);

        $mform = $this->_form; // Instancie un formulaire

        //Taille des champs de saisie
        $attributs = array('size'=>'80');

        $mform->addElement('header', 'headerstone', get_string('titlestone', 'dicomviewer'));

        addElementClassicOnForm($mform, 'title_expected', 'stone_expectedorigin', $dataJsonStone['StoneWebViewer']['ExpectedMessageOrigin'], $attributs);
        addElementClassicOnForm($mform, 'title_dicomweb', 'stone_dicomwebroot', $dataJsonStone['StoneWebViewer']['DicomWebRoot'], $attributs);

        $mform->addElement('header', 'headerohif', get_string('titleohif', 'dicomviewer'));

        addElementClassicOnForm($mform, 'title_wadoUriRoot', 'ohif_wadoUriRoot', $dataJsonOhif['servers']['dicomWeb'][0]['wadoUriRoot'], $attributs);
        addElementClassicOnForm($mform, 'title_qidoRoot', 'ohif_qidoRoot', $dataJsonOhif['servers']['dicomWeb'][0]['qidoRoot'], $attributs);
        addElementClassicOnForm($mform, 'title_wadoRoot', 'ohif_wadoRoot', $dataJsonOhif['servers']['dicomWeb'][0]['wadoRoot'], $attributs);
       
        $this->add_action_buttons();

	}

    /**
     * Custom validation added
     * Update config files of viewer-ohif and stone-ohif
     */
	function validation($data, $files) {

        $arrayEmpty = false;
        foreach($data as $value){
            if(empty($value)){
                $arrayEmpty = true;
            }
        }

        if(!$arrayEmpty){
            //Remplacement dans le fichier de configuration des viewer

            //Modifier le fichier configuration.json du viewer-ohif
            $dataJsonOhif = json_decode(file_get_contents('viewer-ohif/configuration.json'), true);
            $dataJsonOhif['servers']['dicomWeb'][0]['wadoUriRoot'] = $data['ohif_wadoUriRoot'];
            $dataJsonOhif['servers']['dicomWeb'][0]['qidoRoot'] = $data['ohif_qidoRoot'];
            $dataJsonOhif['servers']['dicomWeb'][0]['wadoRoot'] = $data['ohif_wadoRoot'];

            file_put_contents("viewer-ohif/configuration.json", json_encode($dataJsonOhif)); 

            //Ecriture du fichier configuration.json de stone
            $dataJsonStone = json_decode(file_get_contents('viewer-stone/configuration.json'), true);
            $dataJsonStone['StoneWebViewer']['ExpectedMessageOrigin'] = $data['stone_expectedorigin'];
            $dataJsonStone['StoneWebViewer']['DicomWebRoot'] = $data['stone_dicomwebroot'];
            file_put_contents("viewer-stone/configuration.json", json_encode($dataJsonStone)); 
        }
    
        return array();
    }

}

/**
 * Function for add an element on the form
 */
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