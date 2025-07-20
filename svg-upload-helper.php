<?php
/**
 * Plugin Name: SVG Upload Helper
 * Description: Allows safe uploading of SVG files in WordPress.
 * Version: 1.0
 * Author: Amit
 * Author URI: https://amitsharma.dev
 * License: GPL-2.0+
 */

namespace Amit;

defined('ABSPATH') || exit;

class SVGUploadHelper {

    public function __construct() {
        add_filter('upload_mimes', [$this, 'allow_svg']);
        add_action('admin_head', [$this, 'fix_svg_display']);
    }

    /**
     * Allow SVG file types to be uploaded.
     */
    public function allow_svg($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    /**
     * Optional: Fix display of SVGs in media library.
     */
    public function fix_svg_display() {
        echo '<style>
            .media-icon img[src$=".svg"] {
                width: 100% !important;
                height: auto !important;
            }
        </style>';
    }

}

// Initialize the plugin
new SVGUploadHelper();
