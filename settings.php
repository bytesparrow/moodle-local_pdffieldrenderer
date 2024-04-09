<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

defined('MOODLE_INTERNAL') || die();

// Ensure the configurations for this site are set.
if ( $hassiteconfig ) {

    // Create the new settings page.
    $settings = new admin_settingpage( 'local_pdffieldrenderer', get_string("setting_title", "local_pdffieldrenderer") );

    // Add the navigation.
    $ADMIN->add( 'localplugins', $settings );

    // Add a setting field to the settings for this page.
    $settings->add( new admin_setting_configtext(

    // This is the reference you will use to your configuration.
    'local_pdffieldrenderer/custompdffieldname',

    // This is the friendly title for the config, which will be displayed.
        get_string("setting_fieldtitle", "local_pdffieldrenderer"),

        // This is helper text for this config field.
        get_string("setting_fielddescription", "local_pdffieldrenderer"),

    // This is the default value.
    '',

    // This is the type of Parameter this config is.
    PARAM_TEXT

    ) );

}
