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
 * Structure step to restore one dicomviewer activity
 */
class restore_dicomviewer_activity_structure_step extends restore_activity_structure_step {

    /**
     * Return the paths wrapped into standard activity structure
     * @return $paths
     */
    protected function define_structure() {

        $paths = array();

        $paths[] = new restore_path_element('dicomviewer', '/activity/dicomviewer');
        $paths[] = new restore_path_element('dicomviewer_option', '/activity/dicomviewer/options/option');

        return $this->prepare_activity_structure($paths);
    }

    /**
     * Insert the dicomviwer record
     * @param mixed $data
     */
    protected function process_dicomviewer($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;
        $data->course = $this->get_courseid();

        $data->timeopen = $this->apply_date_offset($data->timeopen);
        $data->timeclose = $this->apply_date_offset($data->timeclose);

        $newitemid = $DB->insert_record('dicomviewer', $data);
        // Immediately after inserting "activity" record, call this.
        $this->apply_activity_instance($newitemid);
    }

    /**
     * @param mixed $data
     */
    protected function process_dicomviewer_option($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;

        $data->dicomviewerid = $this->get_new_parentid('dicomviewer');

        $newitemid = $DB->insert_record('dicomviewer_options', $data);
        $this->set_mapping('dicomviewer_option', $oldid, $newitemid);
    }

    /**
     * Add dicomviewer related files
     */
    protected function after_execute() {
        // No need to match by itemname (just internally handled context).
        $this->add_related_files('mod_dicomviewer', 'intro', null);
    }
}
