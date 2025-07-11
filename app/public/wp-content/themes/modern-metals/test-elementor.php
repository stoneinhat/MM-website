<?php
/**
 * Test file to debug Elementor widget loading
 * Access this file via: your-site.local/wp-content/themes/modern-metals/test-elementor.php
 */

// Include WordPress
$wp_load_path = '../../../wp-load.php';
if (file_exists($wp_load_path)) {
    require_once $wp_load_path;
} else {
    die('WordPress not found');
}

echo "<h1>Modern Metals Elementor Test</h1>";

// Test 1: Check if Elementor is active
echo "<h2>Test 1: Elementor Status</h2>";
if (is_plugin_active('elementor/elementor.php')) {
    echo "✅ Elementor plugin is active<br>";
} else {
    echo "❌ Elementor plugin is not active<br>";
}

if (defined('ELEMENTOR_VERSION')) {
    echo "✅ Elementor version: " . ELEMENTOR_VERSION . "<br>";
} else {
    echo "❌ ELEMENTOR_VERSION not defined<br>";
}

// Test 2: Check file paths
echo "<h2>Test 2: File Paths</h2>";
$theme_dir = get_template_directory();
echo "Theme directory: " . $theme_dir . "<br>";

$elementor_init = $theme_dir . '/inc/elementor/elementor-init.php';
if (file_exists($elementor_init)) {
    echo "✅ Elementor init file exists<br>";
} else {
    echo "❌ Elementor init file missing: " . $elementor_init . "<br>";
}

$base_widget = $theme_dir . '/inc/elementor/widgets/base-widget.php';
if (file_exists($base_widget)) {
    echo "✅ Base widget file exists<br>";
} else {
    echo "❌ Base widget file missing: " . $base_widget . "<br>";
}

// Test 3: Try to include files
echo "<h2>Test 3: Include Files</h2>";
try {
    require_once $base_widget;
    echo "✅ Base widget included successfully<br>";
    
    if (class_exists('Modern_Metals_Base_Widget')) {
        echo "✅ Modern_Metals_Base_Widget class exists<br>";
    } else {
        echo "❌ Modern_Metals_Base_Widget class not found<br>";
    }
} catch (Exception $e) {
    echo "❌ Error including base widget: " . $e->getMessage() . "<br>";
}

try {
    $hero_widget = $theme_dir . '/inc/elementor/widgets/hero-widget.php';
    require_once $hero_widget;
    echo "✅ Hero widget included successfully<br>";
    
    if (class_exists('Modern_Metals_Hero_Widget')) {
        echo "✅ Modern_Metals_Hero_Widget class exists<br>";
    } else {
        echo "❌ Modern_Metals_Hero_Widget class not found<br>";
    }
} catch (Exception $e) {
    echo "❌ Error including hero widget: " . $e->getMessage() . "<br>";
}

// Test 4: Check WordPress hooks (updated for new approach)
echo "<h2>Test 4: WordPress Hooks</h2>";

// Check if the initialization function exists
if (has_action('elementor/loaded', 'modern_metals_init_elementor_widgets')) {
    echo "✅ modern_metals_init_elementor_widgets hook is registered on elementor/loaded<br>";
} else {
    echo "❌ modern_metals_init_elementor_widgets hook not found on elementor/loaded<br>";
}

// Check if the widget registration function exists (this would be registered after elementor-init.php is loaded)
if (has_action('elementor/widgets/register', 'modern_metals_register_elementor_widgets')) {
    echo "✅ modern_metals_register_elementor_widgets hook is registered<br>";
} else {
    echo "❌ modern_metals_register_elementor_widgets hook not found<br>";
}

// Check category registration
if (has_action('elementor/elements/categories_registered', 'modern_metals_add_elementor_widget_categories')) {
    echo "✅ Category registration hook is registered<br>";
} else {
    echo "❌ Category registration hook not found<br>";
}

// Test 5: Try to manually trigger initialization (if not already done)
echo "<h2>Test 5: Manual Initialization Test</h2>";
if (function_exists('modern_metals_init_elementor_widgets')) {
    echo "✅ modern_metals_init_elementor_widgets function exists<br>";
    
    // Try to call it manually to see what happens
    echo "Attempting manual initialization...<br>";
    modern_metals_init_elementor_widgets();
    
    // Check again if the widget registration hook is now available
    if (has_action('elementor/widgets/register', 'modern_metals_register_elementor_widgets')) {
        echo "✅ Widget registration hook is now available after manual init<br>";
    } else {
        echo "❌ Widget registration hook still not available after manual init<br>";
    }
} else {
    echo "❌ modern_metals_init_elementor_widgets function not found<br>";
}

// Test 5.5: Force include the elementor-init.php file directly
echo "<h2>Test 5.5: Force Include Elementor Init</h2>";
$elementor_init_path = get_template_directory() . '/inc/elementor/elementor-init.php';
echo "Trying to include: " . $elementor_init_path . "<br>";

if (file_exists($elementor_init_path)) {
    echo "✅ File exists, attempting to include...<br>";
    
    // Enable error reporting temporarily
    $old_error_reporting = error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    try {
        include_once $elementor_init_path;
        echo "✅ File included successfully<br>";
        
        // Check if the function was defined
        if (function_exists('modern_metals_register_elementor_widgets')) {
            echo "✅ modern_metals_register_elementor_widgets function now exists<br>";
        } else {
            echo "❌ modern_metals_register_elementor_widgets function still not found<br>";
        }
        
        // Check if the hook was registered
        if (has_action('elementor/widgets/register', 'modern_metals_register_elementor_widgets')) {
            echo "✅ Widget registration hook is now registered<br>";
        } else {
            echo "❌ Widget registration hook still not registered<br>";
        }
        
    } catch (Exception $e) {
        echo "❌ Error including file: " . $e->getMessage() . "<br>";
    } catch (ParseError $e) {
        echo "❌ Parse error in file: " . $e->getMessage() . "<br>";
    } catch (Error $e) {
        echo "❌ Fatal error in file: " . $e->getMessage() . "<br>";
    }
    
    // Restore error reporting
    error_reporting($old_error_reporting);
} else {
    echo "❌ File does not exist<br>";
}

// Test 6: Check if Elementor widgets manager is available
echo "<h2>Test 6: Elementor Widgets Manager</h2>";
if (class_exists('\Elementor\Plugin')) {
    echo "✅ Elementor Plugin class exists<br>";
    
    if (method_exists('\Elementor\Plugin', 'instance')) {
        echo "✅ Elementor Plugin instance method exists<br>";
        
        try {
            $elementor = \Elementor\Plugin::instance();
            if (isset($elementor->widgets_manager)) {
                echo "✅ Elementor widgets manager is available<br>";
            } else {
                echo "❌ Elementor widgets manager not available<br>";
            }
        } catch (Exception $e) {
            echo "❌ Error accessing Elementor instance: " . $e->getMessage() . "<br>";
        }
    } else {
        echo "❌ Elementor Plugin instance method not found<br>";
    }
} else {
    echo "❌ Elementor Plugin class not found<br>";
}

echo "<h2>Test Complete</h2>";
echo "Check the debug log at: wp-content/debug.log for additional information.";
?> 