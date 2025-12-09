<?php

/**
 * Plugin Name: PlayHQ Gamezone
 * Plugin URI: https://bealcreative.com.au
 * Description: Plugin to add a blcok into Breakdance to show Gamezone data from PlayHQ
 * Author: Tim Knapman
 * Author URI: https://bealcreative.com.au
 * License: GPLv2
 * Text Domain: breakdance
 * Domain Path: /languages/
 * Version: 0.0.1
 */

namespace BreakdanceCustomElements;

use function Breakdance\Util\getDirectoryPathRelativeToPluginFolder;

add_action('breakdance_loaded', function () {
    \Breakdance\ElementStudio\registerSaveLocation(
        getDirectoryPathRelativeToPluginFolder(__DIR__) . '/elements',
        'BreakdanceCustomElements',
        'element',
        'Custom Elements',
        false
    );

    \Breakdance\ElementStudio\registerSaveLocation(
        getDirectoryPathRelativeToPluginFolder(__DIR__) . '/macros',
        'BreakdanceCustomElements',
        'macro',
        'Custom Macros',
        false,
    );

    \Breakdance\ElementStudio\registerSaveLocation(
        getDirectoryPathRelativeToPluginFolder(__DIR__) . '/presets',
        'BreakdanceCustomElements',
        'preset',
        'Custom Presets',
        false,
    );
},
    // register elements before loading them
    9
);

// Add seasons data to Gamezone element  
add_filter('breakdance_element_data_before_render', function($data, $element) {
    if (isset($element['data']['type']) && $element['data']['type'] === 'BreakdanceCustomElements\\Gamezone') {
        // Test with hardcoded data first
        $data['seasons'] = [
            ['season_name' => 'Test 2024-25'],
            ['season_name' => 'Test 2023-24']
        ];
        
        // Then try ACF
        if (function_exists('get_field')) {
            $acf_seasons = get_field('seasons', 'option');
            if ($acf_seasons) {
                $data['seasons'] = $acf_seasons;
            }
        }
    }
    return $data;
}, 10, 2);
