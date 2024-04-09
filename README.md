# PDF-Field Renderer #

Using this plugin you can display a PDF within Moodle. You can have PDFs displayed wherever you can add a custom field. 

## CAUTION ##
This plugin is not yet production-ready because it needs an adapted version of https://github.com/andrewhancox/moodle-customfield_file 
This limitation will be removed in the near future I hope.


## Usage after installation ##
Create a file-field and add its name to config. Wherever this field is used, uploaded PDFs will not be shown as a link but rendered in the browser.
In this example I show you the workflow for displaying a custom field within activities. 
For this the plugin modcustomfields must be installed as well.

#### preparation ####
1. Go to local/modcustomfields/customfield.php
2. Create a customfield of type FILE (in any category you like) with the shortname "rendered_pdffile" (This is a limitation of plugin customfield_file and hopefully to be removed)
4. Go to admin/settings.php?section=local_pdffieldrenderer , enter "rendered_pdffile" and click "save"

#### usage ####
1. Go to your course and create an activity
2. At the bottom you can see your category and the field.
3. Upload a PDF-file.
4. Click "save and show"
5. Now you see your activity and the rendered PDF


## Installing via uploaded ZIP file ##

1. Log in to your Moodle site as an admin and go to _Site administration >
   Plugins > Install plugins_.
2. Upload the ZIP file with the plugin code. You should only be prompted to add
   extra details if your plugin type is not automatically detected.
2.1 If Moodle reports missing plugins, install them as well.
3. Check the plugin validation report and finish the installation.

## Installing manually ##

The plugin can be also installed by putting the contents of this directory to

    {your/moodle/dirroot}/local/pdffieldrenderer

Afterwards, log in to your Moodle site as an admin and go to _Site administration >
Notifications_ to complete the installation.

Alternatively, you can run

    $ php admin/cli/upgrade.php

to complete the installation from the command line.

## License ##

2022 Bernhard Strehl <moodle@bytesparrow.de>

This program is free software: you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program.  If not, see <https://www.gnu.org/licenses/>.
