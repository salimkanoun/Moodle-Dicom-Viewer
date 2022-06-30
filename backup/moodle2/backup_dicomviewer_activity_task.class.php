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
* Affiche les informations sur tous les modules discomviewer
*
* @package     mod_dicomviewer
* @category    admin
* @license     GNU General Public License
* @copyright   2021 | Stage DUT AS Informatique
*/

defined('MOODLE_INTERNAL') || die();

require_once($CFG -> dirroot.'/mod/dicomviewer/backup/moodle2/backup_dicomviewer_stepslib.php');
require_once($CFG -> dirroot.'/mod/dicomviewer/backup/moodle2/backup_dicomviewer_settingslib.php');

/**
* choix de tâche de sauvegarde qui fournit tous les paramètres et les étapes pour effectuer une
* sauvegarde complète de l'activité
*/
class backup_dicomviewer_activity_task extends backup_activity_task {

  /** Définir (ajouter) des paramètres particuliers que cette activité peut avoir
  */ 
  protected function define_my_settings () {

  }

  /**
  * Définir (ajouter) des étapes particulières que cette activité peut avoir
  */
  protected function define_my_steps () {
    $this -> add_step (new  backup_dicomviewer_activity_structure_step('choice_structure' ,  'choice.xml'));
  }

  /** 
  * Coder les transformations à effectuer dans l'activité pour 
  * obtenir des liens transportables (encodés) 
  */ 
  public static function encode_content_links ($content) {
    global  $CFG;

    $base  =  preg_quote ( $CFG -> wwwroot , "/" );

    $search = "/(" . $base . "\/mod\/dicomviewer\/index.php\?id\=)([0-9]+)/";
    $content =  preg_replace ( $search , '$@DICOMVIEWERINDEX*$2@$' ,  $content );

    $search = "/(" . $base . "\/mod\/dicomviewer\/view.php\?id\=)([0-9]+)/" ;
    $content =  preg_replace ( $search ,  '$@DICOMVIEWERVIEWBYID*$2@$' ,  $content );

    return $content; 
    }
 }
 