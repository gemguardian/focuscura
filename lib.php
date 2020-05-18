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
function theme_focuscura_process_css($css, $theme) {
    global $PAGE, $CFG;
    $outputus = $PAGE->get_renderer('theme_focuscura', 'core');
    \theme_essential\toolbox::set_core_renderer($outputus);

    if (file_exists("$CFG->dirroot/theme/essential/lib.php")) {
        require_once("$CFG->dirroot/theme/essential/lib.php");
    } else if (!empty($CFG->themedir) and file_exists("$CFG->themedir/essential/lib.php")) {
        require_once("$CFG->themedir/essential/lib.php");
    } // else will just fail when cannot find theme_essential_process_css!
    $css = theme_essential_process_css($css, $theme);

    // Set custom CSS.
    $customcss = \theme_essential\toolbox::get_setting('focuscuracustomcss');
    $css = theme_focuscura_set_customcss($css, $customcss);

    // Finally return processed CSS.
    return $css;
}

function theme_focuscura_set_customcss($css, $customcss) {
    $tag = '[[setting:focuscuracustomcss]]';
    $replacement = $customcss;
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course.
 * @param stdClass $cm.
 * @param context $context.
 * @param string $filearea.
 * @param array $args.
 * @param bool $forcedownload.
 * @param array $options.
 * @return bool.
 */
function theme_focuscura_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    static $theme;
    if (empty($theme)) {
        $theme = theme_config::load('focuscura');
    }
    if ($context->contextlevel == CONTEXT_SYSTEM) {
        if ($filearea === 'logo') {
            return $theme->setting_file_serve('logo', $args, $forcedownload, $options);
        } else if ($filearea === 'favicon') {
            return $theme->setting_file_serve('favicon', $args, $forcedownload, $options);
        } else if (preg_match("/^fontfile(eot|otf|svg|ttf|woff|woff2)(heading|body)$/", $filearea)) {
            // Ref: http://www.regexr.com/.
            return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
        } else if ($filearea === 'hvp') {
            theme_focuscura_serve_hvp_css($args[1]);
        } else {
            send_file_not_found();
        }
    } else {
        send_file_not_found();
    }
}

/**
 * Serves the H5P Custom CSS.
 *
 * @param type $filename The filename.
 */
function theme_focuscura_serve_hvp_css($filename) {
    global $CFG;
    require_once($CFG->dirroot.'/lib/configonlylib.php'); // For min_enable_zlib_compression().

    $content = \theme_essential\toolbox::get_setting('hvpcustomcss');
    $md5content = md5($content);
    $md5stored = get_config('theme_focuscura', 'hvpccssmd5');
    if ((empty($md5stored)) || ($md5stored != $md5content)) {
        // Content changed, so the last modified time needs to change.
        set_config('hvpccssmd5', $md5content, 'theme_focuscura');
        $lastmodified = time();
        set_config('hvpccsslm', $lastmodified, 'theme_focuscura');
    } else {
        $lastmodified = get_config('theme_focuscura', 'hvpccsslm');
        if (empty($lastmodified)) {
            $lastmodified = time();
        }
    }

    // Sixty days only - the revision may get incremented quite often.
    $lifetime = 60 * 60 * 24 * 60;

    header('HTTP/1.1 200 OK');

    header('Etag: "'.$md5content.'"');
    header('Content-Disposition: inline; filename="'.$filename.'"');
    header('Last-Modified: '.gmdate('D, d M Y H:i:s', $lastmodified).' GMT');
    header('Expires: '.gmdate('D, d M Y H:i:s', time() + $lifetime).' GMT');
    header('Pragma: ');
    header('Cache-Control: public, max-age='.$lifetime);
    header('Accept-Ranges: none');
    header('Content-Type: text/css; charset=utf-8');
    if (!min_enable_zlib_compression()) {
        header('Content-Length: '.strlen($content));
    }

    echo $content;

    die;
}
