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

use core_customfield\output\renderer;


/**
 * Overrides the renderer of plugin moodle-customfield_file
 * To find other renderer-names, edit
 * /moodle-customfield_file/classes/data_controller.php
 * and add
 * var_dump("renderername is:".$customrenderer); exit;
 *
 * @package    local_pdffieldrenderer
 * @copyright  2022 Bernhard Strehl <moodle@bytesparrow.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class core_customfield_renderer extends renderer {


    /**
     * renders the custom field "rendered_pdffile"
     */
    public function render_customfield_local_modcustomfields_mod_rendered_pdffile($model) {

        if (!count($model->files)) {
            return false;
        }

        $fs = get_file_storage();

        $fileid = $model->files[0]->fileid;
        $fileobject = $fs->get_file_by_id($fileid);

        if ($fileobject->get_mimetype() !== 'application/pdf') {
            return "";
        }
        $renderable = new \local_pdfjsrenderer\output\pdfjs_renderer($fileobject);
        return  $this->output->render($renderable);
    }

}
