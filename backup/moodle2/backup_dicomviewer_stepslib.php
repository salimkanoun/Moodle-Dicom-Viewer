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

/**
* Définissez la structure de choix complète pour la sauvegarde, avec des annotations de fichier et d'identifiant
*/ 
class backup_dicomviwer_activity_structure_step extends backup_activity_structure_step {

   protected function define_structure () {
    
      // Définition des éléments.
      $dicomviewer = new backup_nested_element('dicomviewer', array('id'), array( 'name', 'timecreated', 'timemodified', 'intro', 'introformat', 'studyinstance'));

      // Définition de la source.
      $dicomviewer -> set_source_table ( 'dicomviewer' , array ('id' => backup :: VAR_ACTIVITYID));

      // Définition des annotations de fichier.
      $dicomviewer -> annotate_files ('mod_dicomviewer' ,  'intro' ,  null ,  $contextid  =  null);  // Cette zone de fichier n'a pas d'itemid.

      // Renvoyez l'élément racine (choix), enveloppé dans la structure d'activité standard.
      return  $this -> prepare_activity_structure ($dicomviewer);
   } 
}
