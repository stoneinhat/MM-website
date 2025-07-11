/**
 * Modern Metals Elementor Frontend Scripts
 * 
 * JavaScript functionality for Elementor widgets
 */

// Wait for DOM to be ready
document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize Modern Metals widgets
    initializeModernMetalsWidgets();
    
});

/**
 * Initialize all Modern Metals Elementor widgets
 */
function initializeModernMetalsWidgets() {
    
    // Initialize hero widgets
    const heroWidgets = document.querySelectorAll('.elementor-widget-modern-metals-hero');
    heroWidgets.forEach(widget => {
        initializeHeroWidget(widget);
    });
    
    // Initialize other widgets as they're developed
    // initializeGalleryWidgets();
    // initializeAccordionWidgets();
    // etc.
}

/**
 * Initialize hero widget functionality
 */
function initializeHeroWidget(widget) {
    const hero = widget.querySelector('.hero');
    if (!hero) return;
    
    // Add hero-section class for header transparency
    document.body.classList.add('has-hero-section');
    
    // Initialize scroll indicator
    const scrollIndicator = hero.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function() {
            // Scroll to next section
            const nextSection = widget.nextElementSibling;
            if (nextSection) {
                nextSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }
}

/**
 * Utility function to check if we're in Elementor editor
 */
function isElementorEditor() {
    return typeof elementor !== 'undefined' && elementor.isEditMode();
}

/**
 * Handle responsive behavior for widgets
 */
function handleResponsiveWidgets() {
    // Add responsive handling as needed
}

// Handle Elementor frontend events
if (typeof elementorFrontend !== 'undefined') {
    elementorFrontend.hooks.addAction('frontend/element_ready/widget', function($scope) {
        // Re-initialize widgets when Elementor loads them
        const widgetType = $scope.data('widget_type');
        
        if (widgetType && widgetType.startsWith('modern-metals-')) {
            initializeModernMetalsWidgets();
        }
    });
} 