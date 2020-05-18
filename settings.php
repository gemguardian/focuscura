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
 * @package     theme_focuscura
 * @copyright   2020 Gareth J Barnard
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;

// Settings.
$settings = null;

$readme = new moodle_url('/theme/focuscura/README.txt');
$readme = html_writer::link($readme, 'README.txt', array('target' => '_blank'));

$ADMIN->add('themes', new admin_category('theme_focuscura', 'FocusCura'));

// Overridden Essential settings.
$focuscurageneralsettings = new admin_settingpage('theme_focuscura_generic', get_string('genericsettings', 'theme_essential'));
// Initialise individual settings only if admin pages require them.
if ($ADMIN->fulltree) {
    // Custom CSS.
    $name = 'theme_focuscura/focuscuracustomcss';
    $title = get_string('customcss', 'theme_essential');
    $description = get_string('customcssdesc', 'theme_essential');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurageneralsettings->add($setting);
}
$ADMIN->add('theme_focuscura', $focuscurageneralsettings);


// Feature settings.
$focuscurasettingsfeature = new admin_settingpage('theme_focuscura_feature', get_string('featureheading', 'theme_essential'));
if ($ADMIN->fulltree) {
    $focuscurasettingsfeature->add(new admin_setting_heading('theme_focuscura_feature',
        get_string('featureheadingsub', 'theme_essential'),
        format_text(get_string('featuredesc', 'theme_essential'), FORMAT_MARKDOWN)));

    // H5P Custom CSS.
    $name = 'theme_focuscura/hvpcustomcss';
    $title = get_string('hvpcustomcss', 'theme_essential');
    $description = get_string('hvpcustomcssdesc', 'theme_essential');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingsfeature->add($setting);
}
$ADMIN->add('theme_focuscura', $focuscurasettingsfeature);

// Colour settings.
$focuscurasettingscolour = new admin_settingpage('theme_focuscura_colour', get_string('colorheading', 'theme_essential'));
if ($ADMIN->fulltree) {
    $focuscurasettingscolour->add(new admin_setting_heading('theme_focuscura_colour',
        get_string('colorheadingsub', 'theme_essential'),
        format_text(get_string('colordesc', 'theme_essential'), FORMAT_MARKDOWN)));

    // Main theme colour setting.
    $name = 'theme_focuscura/themecolor';
    $title = get_string('themecolor', 'theme_essential');
    $description = get_string('themecolordesc', 'theme_essential');
    $default = '#30add1';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Main theme text colour setting.
    $name = 'theme_focuscura/themetextcolor';
    $title = get_string('themetextcolor', 'theme_essential');
    $description = get_string('themetextcolordesc', 'theme_essential');
    $default = '#217a94';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Main theme link colour setting.
    $name = 'theme_focuscura/themeurlcolor';
    $title = get_string('themeurlcolor', 'theme_essential');
    $description = get_string('themeurlcolordesc', 'theme_essential');
    $default = '#943b21';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Main theme hover colour setting.
    $name = 'theme_focuscura/themehovercolor';
    $title = get_string('themehovercolor', 'theme_essential');
    $description = get_string('themehovercolordesc', 'theme_essential');
    $default = '#6a2a18';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Icon colour setting.
    $name = 'theme_focuscura/themeiconcolor';
    $title = get_string('themeiconcolor', 'theme_essential');
    $description = get_string('themeiconcolordesc', 'theme_essential');
    $default = '#30add1';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Side-pre block background colour setting.
    $name = 'theme_focuscura/themesidepreblockbackgroundcolour';
    $title = get_string('themesidepreblockbackgroundcolour', 'theme_essential');
    $description = get_string('themesidepreblockbackgroundcolourdesc', 'theme_essential');
    $default = '#ffffff';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Side-pre block text colour setting.
    $name = 'theme_focuscura/themesidepreblocktextcolour';
    $title = get_string('themesidepreblocktextcolour', 'theme_essential');
    $description = get_string('themesidepreblocktextcolourdesc', 'theme_essential');
    $default = '#217a94';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Side-pre block url colour setting.
    $name = 'theme_focuscura/themesidepreblockurlcolour';
    $title = get_string('themesidepreblockurlcolour', 'theme_essential');
    $description = get_string('themesidepreblockurlcolourdesc', 'theme_essential');
    $default = '#943b21';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Side-pre block url hover colour setting.
    $name = 'theme_focuscura/themesidepreblockhovercolour';
    $title = get_string('themesidepreblockhovercolour', 'theme_essential');
    $description = get_string('themesidepreblockhovercolourdesc', 'theme_essential');
    $default = '#6a2a18';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Default button text colour setting.
    $name = 'theme_focuscura/themedefaultbuttontextcolour';
    $title = get_string('themedefaultbuttontextcolour', 'theme_essential');
    $description = get_string('themedefaultbuttontextcolourdesc', 'theme_essential');
    $default = '#ffffff';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Default button text hover colour setting.
    $name = 'theme_focuscura/themedefaultbuttontexthovercolour';
    $title = get_string('themedefaultbuttontexthovercolour', 'theme_essential');
    $description = get_string('themedefaultbuttontexthovercolourdesc', 'theme_essential');
    $default = '#ffffff';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Default button background colour setting.
    $name = 'theme_focuscura/themedefaultbuttonbackgroundcolour';
    $title = get_string('themedefaultbuttonbackgroundcolour', 'theme_essential');
    $description = get_string('themedefaultbuttonbackgroundcolourdesc', 'theme_essential');
    $default = '#30add1';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Default button background hover colour setting.
    $name = 'theme_focuscura/themedefaultbuttonbackgroundhovercolour';
    $title = get_string('themedefaultbuttonbackgroundhovercolour', 'theme_essential');
    $description = get_string('themedefaultbuttonbackgroundhovercolourdesc', 'theme_essential');
    $default = '#3ad4ff';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Navigation colour setting.
    $name = 'theme_focuscura/themenavcolor';
    $title = get_string('themenavcolor', 'theme_essential');
    $description = get_string('themenavcolordesc', 'theme_essential');
    $default = '#ffffff';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Theme stripe text colour setting.
    $name = 'theme_focuscura/themestripetextcolour';
    $title = get_string('themestripetextcolour', 'theme_essential');
    $description = get_string('themestripetextcolourdesc', 'theme_essential');
    $default = '#ffffff';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Theme stripe background colour setting.
    $name = 'theme_focuscura/themestripebackgroundcolour';
    $title = get_string('themestripebackgroundcolour', 'theme_essential');
    $description = get_string('themestripebackgroundcolourdesc', 'theme_essential');
    $default = '#ff9a34';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Theme stripe url colour setting.
    $name = 'theme_focuscura/themestripeurlcolour';
    $title = get_string('themestripeurlcolour', 'theme_essential');
    $description = get_string('themestripeurlcolourdesc', 'theme_essential');
    $default = '#25849f';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Quiz \'Submit all and finish\' text colour setting.
    $name = 'theme_focuscura/themequizsubmittextcolour';
    $title = get_string('themequizsubmittextcolour', 'theme_essential');
    $description = get_string('themequizsubmittextcolourdesc', 'theme_essential');
    $default = '#ffffff';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Quiz \'Submit all and finish\' text hover colour setting.
    $name = 'theme_focuscura/themequizsubmittexthovercolour';
    $title = get_string('themequizsubmittexthovercolour', 'theme_essential');
    $description = get_string('themequizsubmittexthovercolourdesc', 'theme_essential');
    $default = '#ffffff';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Quiz \'Submit all and finish\' background colour setting.
    $name = 'theme_focuscura/themequizsubmitbackgroundcolour';
    $title = get_string('themequizsubmitbackgroundcolour', 'theme_essential');
    $description = get_string('themequizsubmitbackgroundcolourdesc', 'theme_essential');
    $default = '#ff9a34';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Quiz \'Submit all and finish\' background hover colour setting.
    $name = 'theme_focuscura/themequizsubmitbackgroundhovercolour';
    $title = get_string('themequizsubmitbackgroundhovercolour', 'theme_essential');
    $description = get_string('themequizsubmitbackgroundhovercolourdesc', 'theme_essential');
    $default = '#ffaf60';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // This is the descriptor for the footer.
    $name = 'theme_focuscura/footercolorinfo';
    $heading = get_string('footercolors', 'theme_essential');
    $information = get_string('footercolorsdesc', 'theme_essential');
    $setting = new admin_setting_heading($name, $heading, $information);
    $focuscurasettingscolour->add($setting);

    // Footer background colour setting.
    $name = 'theme_focuscura/footercolor';
    $title = get_string('footercolor', 'theme_essential');
    $description = get_string('footercolordesc', 'theme_essential');
    $default = '#30add1';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Footer text colour setting.
    $name = 'theme_focuscura/footertextcolor';
    $title = get_string('footertextcolor', 'theme_essential');
    $description = get_string('footertextcolordesc', 'theme_essential');
    $default = '#ffffff';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Footer heading colour setting.
    $name = 'theme_focuscura/footerheadingcolor';
    $title = get_string('footerheadingcolor', 'theme_essential');
    $description = get_string('footerheadingcolordesc', 'theme_essential');
    $default = '#cccccc';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Footer block background colour setting.
    $name = 'theme_focuscura/footerblockbackgroundcolour';
    $title = get_string('footerblockbackgroundcolour', 'theme_essential');
    $description = get_string('footerblockbackgroundcolourdesc', 'theme_essential');
    $default = '#cccccc';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Footer block text colour setting.
    $name = 'theme_focuscura/footerblocktextcolour';
    $title = get_string('footerblocktextcolour', 'theme_essential');
    $description = get_string('footerblocktextcolourdesc', 'theme_essential');
    $default = '#000000';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Footer block URL colour setting.
    $name = 'theme_focuscura/footerblockurlcolour';
    $title = get_string('footerblockurlcolour', 'theme_essential');
    $description = get_string('footerblockurlcolourdesc', 'theme_essential');
    $default = '#000000';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Footer block URL hover colour setting.
    $name = 'theme_focuscura/footerblockhovercolour';
    $title = get_string('footerblockhovercolour', 'theme_essential');
    $description = get_string('footerblockhovercolourdesc', 'theme_essential');
    $default = '#555555';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Footer seperator colour setting.
    $name = 'theme_focuscura/footersepcolor';
    $title = get_string('footersepcolor', 'theme_essential');
    $description = get_string('footersepcolordesc', 'theme_essential');
    $default = '#313131';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Footer URL colour setting.
    $name = 'theme_focuscura/footerurlcolor';
    $title = get_string('footerurlcolor', 'theme_essential');
    $description = get_string('footerurlcolordesc', 'theme_essential');
    $default = '#cccccc';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);

    // Footer URL hover colour setting.
    $name = 'theme_focuscura/footerhovercolor';
    $title = get_string('footerhovercolor', 'theme_essential');
    $description = get_string('footerhovercolordesc', 'theme_essential');
    $default = '#bbbbbb';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingscolour->add($setting);
}
$ADMIN->add('theme_focuscura', $focuscurasettingscolour);

// Header settings.
$focuscurasettingsheader = new admin_settingpage('theme_focuscura_header', get_string('headerheading', 'theme_essential'));
if ($ADMIN->fulltree) {
    global $CFG;
    if (file_exists("{$CFG->dirroot}/theme/essential/essential_admin_setting_configtext.php")) {
        require_once($CFG->dirroot . '/theme/essential/essential_admin_setting_configtext.php');
        require_once($CFG->dirroot . '/theme/essential/essential_admin_setting_configradio.php');
    } else if (!empty($CFG->themedir) && file_exists("{$CFG->themedir}/essential/essential_admin_setting_configtext.php")) {
        require_once($CFG->themedir . '/essential/essential_admin_setting_configtext.php');
        require_once($CFG->themedir . '/essential/essential_admin_setting_configradio.php');
    }

    // Logo file setting.
    $name = 'theme_focuscura/logo';
    $title = get_string('logo', 'theme_essential');
    $description = get_string('logodesc', 'theme_essential');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingsheader->add($setting);

    // Logo desktop width setting.
    $name = 'theme_focuscura/logodesktopwidth';
    $title = get_string('logodesktopwidth', 'theme_essential');
    $default = 25;
    $lower = 1;
    $upper = 100;
    $description = get_string('logodesktopwidthdesc', 'theme_essential',
        array('lower' => $lower, 'upper' => $upper));
    $setting = new essential_admin_setting_configinteger($name, $title, $description, $default, $lower, $upper);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingsheader->add($setting);

    // Logo mobile width setting.
    $name = 'theme_focuscura/logomobilewidth';
    $title = get_string('logomobilewidth', 'theme_essential');
    $default = 10;
    $lower = 1;
    $upper = 100;
    $description = get_string('logomobilewidthdesc', 'theme_essential',
        array('lower' => $lower, 'upper' => $upper));
    $setting = new essential_admin_setting_configinteger($name, $title, $description, $default, $lower, $upper);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingsheader->add($setting);

    // Header text colour setting.
    $name = 'theme_focuscura/headertextcolor';
    $title = get_string('headertextcolor', 'theme_essential');
    $description = get_string('headertextcolordesc', 'theme_essential');
    $default = '#217a94';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingsheader->add($setting);
}
$ADMIN->add('theme_focuscura', $focuscurasettingsheader);

// Font settings.
$focuscurasettingsfont = new admin_settingpage('theme_focuscura_font', get_string('fontsettings', 'theme_essential'));
if ($ADMIN->fulltree) {
    // This is the descriptor for the font settings.
    $name = 'theme_focuscura/fontheading';
    $heading = get_string('fontheadingsub', 'theme_essential');
    $information = get_string('fontheadingdesc', 'theme_essential');
    $setting = new admin_setting_heading($name, $heading, $information);
    $focuscurasettingsfont->add($setting);

    // Font selector.
    $gws = html_writer::link('//www.google.com/fonts',
        get_string('fonttypegoogle', 'theme_essential'), array('target' => '_blank'));
    $name = 'theme_focuscura/fontselect';
    $title = get_string('fontselect', 'theme_essential');
    $description = get_string('fontselectdesc', 'theme_essential', array('googlewebfonts' => $gws));
    $default = 1;
    $choices = array(
        1 => get_string('fonttypeuser', 'theme_essential'),
        2 => get_string('fonttypegoogle', 'theme_essential'),
        3 => get_string('fonttypecustom', 'theme_essential')
    );
    $setting = new essential_admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingsfont->add($setting);

    // Heading font name.
    $name = 'theme_focuscura/fontnameheading';
    $title = get_string('fontnameheading', 'theme_essential');
    $description = get_string('fontnameheadingdesc', 'theme_essential');
    $default = 'Verdana';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingsfont->add($setting);

    // Text font name.
    $name = 'theme_focuscura/fontnamebody';
    $title = get_string('fontnamebody', 'theme_essential');
    $description = get_string('fontnamebodydesc', 'theme_essential');
    $default = 'Verdana';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $focuscurasettingsfont->add($setting);

    if (get_config('theme_focuscura', 'fontselect') === "2") {
        // Google font character sets.
        $name = 'theme_focuscura/fontcharacterset';
        $title = get_string('fontcharacterset', 'theme_essential');
        $description = get_string('fontcharactersetdesc', 'theme_essential');
        $default = 'latin-ext';
        $setting = new admin_setting_configmulticheckbox($name, $title, $description, $default,
            array(
                'latin-ext' => get_string('fontcharactersetlatinext', 'theme_essential'),
                'cyrillic' => get_string('fontcharactersetcyrillic', 'theme_essential'),
                'cyrillic-ext' => get_string('fontcharactersetcyrillicext', 'theme_essential'),
                'greek' => get_string('fontcharactersetgreek', 'theme_essential'),
                'greek-ext' => get_string('fontcharactersetgreekext', 'theme_essential'),
                'vietnamese' => get_string('fontcharactersetvietnamese', 'theme_essential')
            )
        );
        $setting->set_updatedcallback('theme_reset_all_caches');
        $focuscurasettingsfont->add($setting);
    } else if (get_config('theme_focuscura', 'fontselect') === "3") {
        // This is the descriptor for the font files.
        $name = 'theme_focuscura/fontfiles';
        $heading = get_string('fontfiles', 'theme_essential');
        $information = get_string('fontfilesdesc', 'theme_essential');
        $setting = new admin_setting_heading($name, $heading, $information);
        $focuscurasettingsfont->add($setting);

        // Heading fonts.
        // TTF font.
        $name = 'theme_focuscura/fontfilettfheading';
        $title = get_string('fontfilettfheading', 'theme_essential');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilettfheading');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $focuscurasettingsfont->add($setting);

        // OTF font.
        $name = 'theme_focuscura/fontfileotfheading';
        $title = get_string('fontfileotfheading', 'theme_essential');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfileotfheading');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $focuscurasettingsfont->add($setting);

        // WOFF font.
        $name = 'theme_focuscura/fontfilewoffheading';
        $title = get_string('fontfilewoffheading', 'theme_essential');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilewoffheading');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $focuscurasettingsfont->add($setting);

        // WOFF2 font.
        $name = 'theme_focuscura/fontfilewofftwoheading';
        $title = get_string('fontfilewofftwoheading', 'theme_essential');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilewofftwoheading');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $focuscurasettingsfont->add($setting);

        // EOT font.
        $name = 'theme_focuscura/fontfileeotheading';
        $title = get_string('fontfileeotheading', 'theme_essential');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfileeotheading');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $focuscurasettingsfont->add($setting);

        // SVG font.
        $name = 'theme_focuscura/fontfilesvgheading';
        $title = get_string('fontfilesvgheading', 'theme_essential');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilesvgheading');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $focuscurasettingsfont->add($setting);

        // Body fonts.
        // TTF font.
        $name = 'theme_focuscura/fontfilettfbody';
        $title = get_string('fontfilettfbody', 'theme_essential');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilettfbody');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $focuscurasettingsfont->add($setting);

        // OTF font.
        $name = 'theme_focuscura/fontfileotfbody';
        $title = get_string('fontfileotfbody', 'theme_essential');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfileotfbody');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $focuscurasettingsfont->add($setting);

        // WOFF font.
        $name = 'theme_focuscura/fontfilewoffbody';
        $title = get_string('fontfilewoffbody', 'theme_essential');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilewoffbody');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $focuscurasettingsfont->add($setting);

        // WOFF2 font.
        $name = 'theme_focuscura/fontfilewofftwobody';
        $title = get_string('fontfilewofftwobody', 'theme_essential');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilewofftwobody');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $focuscurasettingsfont->add($setting);

        // EOT font.
        $name = 'theme_focuscura/fontfileeotbody';
        $title = get_string('fontfileeotbody', 'theme_essential');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfileeotbody');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $focuscurasettingsfont->add($setting);

        // SVG font.
        $name = 'theme_focuscura/fontfilesvgbody';
        $title = get_string('fontfilesvgbody', 'theme_essential');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilesvgbody');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $focuscurasettingsfont->add($setting);
    }

    $focuscurasettingsfont->add(new admin_setting_heading('theme_focuscura_fontreadme',
        get_string('readme_title', 'theme_essential'), get_string('readme_desc', 'theme_essential', array('url' => $readme))));
}
$ADMIN->add('theme_focuscura', $focuscurasettingsfont);
