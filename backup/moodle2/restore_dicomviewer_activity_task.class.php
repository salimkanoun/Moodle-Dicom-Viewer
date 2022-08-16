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

require_once($CFG->dirroot . '/mod/dicomviewer/backup/moodle2/restore_dicomviewer_stepslib.php'); // Because it exists (must).

/**
 * dicomviewer restore task that provides all the settings and steps to perform one complete restore of the activity
 */
class restore_dicomviewer_activity_task extends restore_activity_task {

    /**
     * Define (add) particular settings this activity can have
     */
    protected function define_my_settings() {
        // No particular settings for this activity.
    }

    /**
     * Define (add) particular steps this activity can have
     */
    protected function define_my_steps() {
        // Dicomviewer only has one structure step.
        $this->add_step(new restore_dicomviewer_activity_structure_step('dicomviewer_structure', 'dicomviewer.xml'));
    }

    /**
     * Define the contents in the activity that must be
     * processed by the link decoder
     */
    public static function define_decode_contents() {
        $contents = array();

        $contents[] = new restore_decode_content('dicomviewer', array('intro'), 'dicomviewer');

        return $contents;
    }

    /**
     * Define the decoding rules for links belonging
     * to the activity to be executed by the link decoder
     */
    public static function define_decode_rules() {
        $rules = array();

        $rules[] = new restore_decode_rule('DICOMVIEWERVIEWBYID', '/mod/dicomviewer/view.php?id=$1', 'course_module');
        $rules[] = new restore_decode_rule('DICOMVIEWERINDEX', '/mod/dicomviewer/index.php?id=$1', 'course');

        return $rules;
    }

    /**
     * Define the restore log rules that will be applied when restoring dicomviewer logs
     * It must return one array of objects
     */
    public static function define_restore_log_rules() {
        $rules = array();

        $rules[] = new restore_log_rule('dicomviewer', 'add', 'view.php?id={course_module}', '{dicomviewer}');
        $rules[] = new restore_log_rule('dicomviewer', 'update', 'view.php?id={course_module}', '{dicomviewer}');
        $rules[] = new restore_log_rule('dicomviewer', 'view', 'view.php?id={course_module}', '{dicomviewer}');
        $rules[] = new restore_log_rule('dicomviewer', 'choose', 'view.php?id={course_module}', '{dicomviewer}');
        $rules[] = new restore_log_rule('dicomviewer', 'choose again', 'view.php?id={course_module}', '{dicomviewer}');
        $rules[] = new restore_log_rule('dicomviewer', 'report', 'report.php?id={course_module}', '{dicomviewer}');

        return $rules;
    }

    /**
     * Define the restore log rules that will be applied when restoring course logs
     * It must return one array of objects
     *
     * Note this rules are applied when restoring course logs
     * by the restore final task, but are defined here at
     * activity level. All them are rules not linked to any module instance (cmid = 0)
     */
    public static function define_restore_log_rules_for_course() {
        $rules = array();

        // Fix old wrong uses (missing extension).
        $rules[] = new restore_log_rule('dicomviewer', 'view all', 'index?id={course}', null, null, null, 'index.php?id={course}');
        $rules[] = new restore_log_rule('dicomviewer', 'view all', 'index.php?id={course}', null);
        return $rules;
    }

}
