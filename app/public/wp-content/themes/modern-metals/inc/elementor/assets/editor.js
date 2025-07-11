/**
 * Modern Metals Elementor Editor Scripts
 * 
 * JavaScript functionality for the Elementor editor interface
 */

// Wait for Elementor to be ready
document.addEventListener('DOMContentLoaded', function() {
    
    // Check if we're in Elementor editor
    if (typeof elementor === 'undefined') {
        return;
    }
    
    // Initialize editor functionality
    initializeModernMetalsEditor();
    
});

/**
 * Initialize Modern Metals editor functionality
 */
function initializeModernMetalsEditor() {
    
    // Add custom category icon styling
    addCustomCategoryStyles();
    
    // Handle widget preview updates
    handleWidgetPreviews();
    
}

/**
 * Add custom styling for Modern Metals widget category
 */
function addCustomCategoryStyles() {
    
    // Add custom CSS for widget category
    const style = document.createElement('style');
    style.textContent = `
        .elementor-panel-category-title[data-tab="modern-metals"] {
            background: linear-gradient(45deg, #333, #666);
            color: white;
        }
        
        .elementor-element[data-widget_type^="modern-metals-"] {
            border-left: 3px solid #333;
        }
        
        .elementor-element[data-widget_type^="modern-metals-"] .elementor-editor-element-settings {
            background: rgba(51, 51, 51, 0.1);
        }
    `;
    document.head.appendChild(style);
}

/**
 * Handle widget preview updates in editor
 */
function handleWidgetPreviews() {
    
    // Listen for Elementor events
    if (typeof elementor !== 'undefined') {
        
        // Handle widget changes
        elementor.hooks.addAction('panel/open_editor/widget', function(panel, model, view) {
            const widgetType = model.get('widgetType');
            
            if (widgetType && widgetType.startsWith('modern-metals-')) {
                handleModernMetalsWidgetEditor(panel, model, view);
            }
        });
        
        // Handle live preview updates
        elementor.hooks.addAction('frontend/element_ready/widget', function($scope) {
            const widgetType = $scope.data('widget_type');
            
            if (widgetType && widgetType.startsWith('modern-metals-')) {
                updateWidgetPreview($scope, widgetType);
            }
        });
    }
}

/**
 * Handle Modern Metals widget editor functionality
 */
function handleModernMetalsWidgetEditor(panel, model, view) {
    
    // Add help text for Modern Metals widgets
    const widgetType = model.get('widgetType');
    
    // Add custom help information
    setTimeout(function() {
        addWidgetHelpText(widgetType);
    }, 100);
}

/**
 * Add help text for widgets
 */
function addWidgetHelpText(widgetType) {
    
    const helpTexts = {
        'modern-metals-hero': 'Create stunning hero sections with background images, customizable text, and call-to-action buttons.',
        'modern-metals-introduction': 'Add introduction sections with text and image combinations.',
        'modern-metals-gallery': 'Display project galleries with smooth scrolling and navigation.',
        'modern-metals-accordion': 'Showcase services in an interactive accordion format.',
        'modern-metals-team': 'Display team members in a beautiful grid layout.',
        'modern-metals-testimonials': 'Add rotating customer testimonials.',
        'modern-metals-contact': 'Create contact forms and call-to-action sections.'
    };
    
    const helpText = helpTexts[widgetType];
    if (helpText) {
        const panel = document.querySelector('.elementor-panel-content-wrapper');
        if (panel && !panel.querySelector('.mm-widget-help')) {
            const helpDiv = document.createElement('div');
            helpDiv.className = 'mm-widget-help';
            helpDiv.style.cssText = 'background: #f0f0f0; padding: 10px; margin: 10px 0; border-radius: 4px; font-size: 12px; color: #666;';
            helpDiv.innerHTML = `<strong>💡 Tip:</strong> ${helpText}`;
            
            const firstSection = panel.querySelector('.elementor-control-section');
            if (firstSection) {
                firstSection.parentNode.insertBefore(helpDiv, firstSection);
            }
        }
    }
}

/**
 * Update widget preview in editor
 */
function updateWidgetPreview($scope, widgetType) {
    
    // Specific preview updates for different widget types
    switch (widgetType) {
        case 'modern-metals-hero':
            updateHeroPreview($scope);
            break;
        // Add other widget preview updates as needed
    }
}

/**
 * Update hero widget preview
 */
function updateHeroPreview($scope) {
    
    const hero = $scope.find('.hero')[0];
    if (hero) {
        // Ensure proper styling in editor
        hero.style.position = 'relative';
        hero.style.minHeight = '400px';
        
        // Add body class for header transparency
        if (document.body) {
            document.body.classList.add('has-hero-section');
        }
    }
} 