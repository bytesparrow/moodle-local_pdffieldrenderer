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

namespace local_pdffieldrenderer\output;

use core_customfield\api;

/**
 * Modifies Moodle's main-content to render a PDF-file
 *
 * @package    local_pdffieldrenderer
 * @copyright  2022 Bernhard Strehl <moodle@bytesparrow.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class core_modifier extends \core_modifier_base {

  /**
   * Returns rendered pdf
   */
  public function get_content_to_attach_to_main() {
    global $PAGE;
    $expectedcustomfield = get_config('local_pdffieldrenderer', 'custompdffieldname');

    $instanceid = \optional_param('id', null, PARAM_INT); // Oder ohne int..

    $customfieldhandler = \local_modcustomfields\customfield\mod_handler::create();

    $instancerecords = $customfieldhandler->get_instance_data($instanceid, true);
    $currentcontext = $PAGE->context;

    foreach ($instancerecords as $record) {
      //context check: else: elements on profile pages etc
      if ($currentcontext->id != $record->get('contextid')) {
        continue;
      }
      if ($record->get_field()->get('shortname') == $expectedcustomfield) {
        $attachedcontent = $record->export_value();
        return $attachedcontent;
      }
    }

    return "";
  }

}
