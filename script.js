// Mobile Navigation Toggle
const hamburger = document.querySelector('.hamburger');
const navMenu = document.querySelector('.nav-menu');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
});

// Close mobile menu when clicking on a link
document.querySelectorAll('.nav-menu a').forEach(n => n.addEventListener('click', () => {
    hamburger.classList.remove('active');
    navMenu.classList.remove('active');
}));

// Dropdown functionality for mobile
const dropdowns = document.querySelectorAll('.dropdown');
dropdowns.forEach(dropdown => {
    const dropdownLink = dropdown.querySelector('a');
    const dropdownContent = dropdown.querySelector('.dropdown-content');
    
    if (dropdownContent) {
        dropdownLink.addEventListener('click', (e) => {
            // Only prevent default on mobile
            if (window.innerWidth <= 768) {
                e.preventDefault();
                dropdown.classList.toggle('active');
            }
        });
    }
});

// Header scroll functionality
window.addEventListener('scroll', () => {
    const header = document.querySelector('.header');
    if (window.scrollY > 100) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// Gallery Showcase Functionality
class GalleryShowcase {
    constructor() {
        this.track = document.querySelector('.gallery-track');
        this.slides = document.querySelectorAll('.gallery-slide');
        this.prevBtn = document.querySelector('.prev-btn');
        this.nextBtn = document.querySelector('.next-btn');
        this.originalSlideCount = this.slides.length;
        this.slideWidth = 300 + 32; // slide width + gap
        this.autoPlayInterval = null;
        this.currentIndex = 0;
        this.isTransitioning = false;
        
        // Smooth scroll properties
        this.smoothScrollAnimation = null;
        this.isManualControl = false;
        this.currentTranslateX = 0;
        this.smoothScrollSpeed = 0.5; // pixels per frame for smooth scroll
        this.manualControlTimeout = null;
        
        this.init();
    }
    
    init() {
        this.createInfiniteLoop();
        this.setupEventListeners();
        this.startSmoothAutoScroll();
    }
    
    createInfiniteLoop() {
        // Clone slides for infinite loop effect
        const originalSlides = Array.from(this.slides);
        
        // Create enough clones for seamless scrolling
        // Add clones at the end (for forward scrolling)
        originalSlides.forEach(slide => {
            const clone = slide.cloneNode(true);
            clone.classList.add('clone', 'clone-end');
            this.track.appendChild(clone);
        });
        
        // Add another set of clones at the end for extra buffer
        originalSlides.forEach(slide => {
            const clone = slide.cloneNode(true);
            clone.classList.add('clone', 'clone-end-extra');
            this.track.appendChild(clone);
        });
        
        // Add clones at the beginning (for backward scrolling)
        originalSlides.slice().reverse().forEach(slide => {
            const clone = slide.cloneNode(true);
            clone.classList.add('clone', 'clone-start');
            this.track.insertBefore(clone, this.track.firstChild);
        });
        
        // Update slides reference to include clones
        this.slides = document.querySelectorAll('.gallery-slide');
        this.totalSlides = this.slides.length;
        
        // Start at the first real slide (after the prepended clones)
        this.currentIndex = this.originalSlideCount;
        this.currentTranslateX = -this.currentIndex * this.slideWidth;
        this.track.style.transform = `translateX(${this.currentTranslateX}px)`;
    }
    
    setupEventListeners() {
        this.prevBtn.addEventListener('click', () => this.manualPrevSlide());
        this.nextBtn.addEventListener('click', () => this.manualNextSlide());
        
        // Pause smooth scroll on hover
        this.track.addEventListener('mouseenter', () => this.pauseSmoothScroll());
        this.track.addEventListener('mouseleave', () => this.resumeSmoothScroll());
    }
    
    manualNextSlide() {
        this.stopSmoothScroll();
        this.isManualControl = true;
        this.currentIndex++;
        this.snapToSlide();
        this.scheduleResumeAutoScroll();
    }
    
    manualPrevSlide() {
        this.stopSmoothScroll();
        this.isManualControl = true;
        this.currentIndex--;
        this.snapToSlide();
        this.scheduleResumeAutoScroll();
    }
    
    snapToSlide() {
        const targetX = -this.currentIndex * this.slideWidth;
        this.track.style.transition = 'transform 0.5s ease';
        this.track.style.transform = `translateX(${targetX}px)`;
        this.currentTranslateX = targetX;
        
        // Handle infinite loop boundaries
        setTimeout(() => {
            this.handleInfiniteLoopBoundaries();
        }, 500);
    }
    
    handleInfiniteLoopBoundaries() {
        // With our new structure: [start-clones][real][end-clones][extra-clones]
        // Real slides are at indices: originalSlideCount to (originalSlideCount * 2 - 1)
        // End clones start at: originalSlideCount * 2
        // Extra clones start at: originalSlideCount * 3
        
        // If we're past the first set of end clones, jump back to real slides
        if (this.currentIndex >= this.originalSlideCount * 3) {
            this.track.style.transition = 'none';
            this.currentIndex = this.originalSlideCount;
            this.currentTranslateX = -this.currentIndex * this.slideWidth;
            this.track.style.transform = `translateX(${this.currentTranslateX}px)`;
        }
        
        // If we're in the start clones, jump to the end of real slides
        if (this.currentIndex < this.originalSlideCount) {
            this.track.style.transition = 'none';
            this.currentIndex = this.originalSlideCount * 2 - 1;
            this.currentTranslateX = -this.currentIndex * this.slideWidth;
            this.track.style.transform = `translateX(${this.currentTranslateX}px)`;
        }
    }
    
    scheduleResumeAutoScroll() {
        if (this.manualControlTimeout) {
            clearTimeout(this.manualControlTimeout);
        }
        this.manualControlTimeout = setTimeout(() => {
            this.isManualControl = false;
            this.startSmoothAutoScroll();
        }, 3000);
    }
    
    startSmoothAutoScroll() {
        if (this.isManualControl) return;
        
        this.track.style.transition = 'none';
        this.smoothScrollAnimation = requestAnimationFrame(() => this.smoothScrollFrame());
    }
    
    smoothScrollFrame() {
        if (this.isManualControl) return;
        
        // Move smoothly to the right
        this.currentTranslateX -= this.smoothScrollSpeed;
        
        // Calculate key positions
        const oneSetWidth = this.originalSlideCount * this.slideWidth;
        
        // Structure: [start-clones(6)][real(6)][end-clones(6)][extra(6)]
        // Positions: 0-5: start clones, 6-11: real, 12-17: end clones, 18-23: extra
        // currentTranslateX starts at -6*slideWidth (showing first real slide)
        
        // When we've scrolled past the end clones (position -18*slideWidth),
        // seamlessly reset to the beginning of real slides (position -6*slideWidth)
        if (Math.abs(this.currentTranslateX) >= oneSetWidth * 3) {
            // Reset to beginning of real slides for seamless infinite loop
            this.currentTranslateX = -oneSetWidth;
        }
        
        // Apply the transform
        this.track.style.transform = `translateX(${this.currentTranslateX}px)`;
        
        this.smoothScrollAnimation = requestAnimationFrame(() => this.smoothScrollFrame());
    }
    
    stopSmoothScroll() {
        if (this.smoothScrollAnimation) {
            cancelAnimationFrame(this.smoothScrollAnimation);
            this.smoothScrollAnimation = null;
        }
    }
    
    pauseSmoothScroll() {
        this.stopSmoothScroll();
    }
    
    resumeSmoothScroll() {
        if (!this.isManualControl) {
            this.startSmoothAutoScroll();
        }
    }
    
    // Legacy methods for compatibility
    startAutoPlay() {
        this.startSmoothAutoScroll();
    }
    
    stopAutoPlay() {
        this.stopSmoothScroll();
    }
}

// Services Navigation
class WorksDetailNavigation {
    constructor() {
        this.navItems = document.querySelectorAll('.vertical-nav .nav-item');
        this.projectImage = document.getElementById('project-image');
        this.projectTitle = document.getElementById('project-title');
        this.projectDescription = document.getElementById('project-description');
        this.projectDate = document.getElementById('project-date');
        this.projectData = {
            'metalscapes': {
                image: 'works detailed.jpg',
                title: 'Custom Metal Landscapes',
                description: 'Creating sustainable outdoor environments that blend seamlessly with nature while providing durable, long-lasting metal structures that enhance your outdoor living space.',
                date: '2024'
            },
            'fire-features': {
                image: 'home page.jpg',
                title: 'Fire Features & Trays',
                description: 'Handcrafted fire features that combine functionality with artistic design, creating the perfect centerpiece for outdoor gatherings and relaxation. Each piece is custom-designed to complement your outdoor space.',
                date: 'December 2020'
            },
            'other-works': {
                image: 'home page.png',
                title: 'Other Custom Metal Works',
                description: 'From architectural elements to artistic installations, we create unique metal pieces that transform spaces and tell stories of craftsmanship. Every project reflects our commitment to quality and innovation.',
                date: '2023'
            }
        };
        this.init();
    }
    init() {
        this.navItems.forEach(item => {
            item.addEventListener('click', () => {
                this.setActiveItem(item);
                this.updateContent(item.dataset.category);
            });
        });
    }
    setActiveItem(activeItem) {
        this.navItems.forEach(item => item.classList.remove('active'));
        activeItem.classList.add('active');
    }
    updateContent(category) {
        const data = this.projectData[category];
        if (!data) return;
        // Fade out
        this.projectImage.style.opacity = '0';
        this.projectTitle.style.opacity = '0';
        this.projectDescription.style.opacity = '0';
        this.projectDate.style.opacity = '0';
        setTimeout(() => {
            this.projectImage.src = data.image;
            this.projectTitle.textContent = data.title;
            this.projectDescription.textContent = data.description;
            this.projectDate.textContent = data.date;
            // Fade in
            this.projectImage.style.opacity = '1';
            this.projectTitle.style.opacity = '1';
            this.projectDescription.style.opacity = '1';
            this.projectDate.style.opacity = '1';
        }, 200);
    }
}

// Sequential Step Animation
class StepAnimation {
    constructor() {
        this.steps = document.querySelectorAll('.fade-in-step');
        this.commercialText = document.getElementById('commercial-text');
        this.residentialText = document.getElementById('residential-text');
        this.observer = null;
        this.animationDelay = 1400; // 1400ms delay between each step (slowed down more)
        this.currentStep = 0;
        this.activeStep = null; // Track which step is actively selected (clicked)
        this.textContent = {
            1: {
                commercial: "Simply email your plans or job details to receive a quote and ask about our contractor discount.",
                residential: "Starting your landscape from scratch? We can help from design to install."
            },
            2: {
                commercial: "Our designs for commercial space vary widely in style, but are consistently great in quality",
                residential: "A beautiful home is one click away"
            },
            3: {
                commercial: "Our team will assemble the best contractors for your build.",
                residential: "Your home, our dedicated project."
            }
        };
        this.init();
    }
    
    init() {
        if (this.steps.length > 0) {
            this.setupIntersectionObserver();
            this.setupStepHoverListeners();
            // Initialize with Step 1 text showing
            setTimeout(() => {
                if (this.commercialText && this.residentialText) {
                    this.commercialText.classList.add('fade-in');
                    this.residentialText.classList.add('fade-in');
                }
            }, 100);
        }
    }
    
    setupIntersectionObserver() {
        const options = {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        };
        
        this.observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.animateSteps();
                    this.observer.unobserve(entry.target);
                }
            });
        }, options);
        
        // Observe the first step to trigger animation when it comes into view
        if (this.steps[0]) {
            this.observer.observe(this.steps[0]);
        }
    }
    
    animateSteps() {
        this.steps.forEach((step, index) => {
            setTimeout(() => {
                step.classList.add('fade-in');
                this.updateText(index + 1);
            }, index * this.animationDelay);
        });
    }
    
    updateText(stepNumber) {
        // Fade out current text
        if (this.commercialText && this.residentialText) {
            this.commercialText.classList.remove('fade-in');
            this.residentialText.classList.remove('fade-in');
            
            // Update text content and fade in after a short delay
            setTimeout(() => {
                this.commercialText.textContent = this.textContent[stepNumber].commercial;
                this.residentialText.textContent = this.textContent[stepNumber].residential;
                
                // Fade in new text
                setTimeout(() => {
                    this.commercialText.classList.add('fade-in');
                    this.residentialText.classList.add('fade-in');
                }, 100);
            }, 200);
        }
    }
    
    setupStepHoverListeners() {
        this.steps.forEach((step, index) => {
            const stepNumber = index + 1;
            
            // Hover events for desktop
            step.addEventListener('mouseenter', () => {
                if (!this.activeStep) { // Only hover if no step is actively selected
                    this.handleStepHover(stepNumber);
                }
            });
            
            step.addEventListener('mouseleave', () => {
                if (!this.activeStep) { // Only handle leave if no step is actively selected
                    this.handleStepLeave();
                }
            });
            
            // Click events for mobile and desktop
            step.addEventListener('click', () => {
                this.handleStepClick(stepNumber);
            });
        });
        
        // Click outside to deselect (on the intro-bottom container)
        const introBottom = document.querySelector('.intro-bottom');
        if (introBottom) {
            introBottom.addEventListener('click', (e) => {
                // If click is not on a step, deselect
                if (!e.target.closest('.step-item')) {
                    this.handleStepDeselect();
                }
            });
        }
    }
    
    handleStepHover(stepNumber) {
        // Update visual state of steps
        this.steps.forEach((step, index) => {
            if (index + 1 === stepNumber) {
                step.classList.add('step-hovered');
                step.classList.remove('step-dimmed');
            } else {
                step.classList.add('step-dimmed');
                step.classList.remove('step-hovered');
            }
        });
        
        // Update text content immediately
        if (this.commercialText && this.residentialText) {
            this.commercialText.textContent = this.textContent[stepNumber].commercial;
            this.residentialText.textContent = this.textContent[stepNumber].residential;
        }
    }
    
    handleStepLeave() {
        // Remove all hover classes
        this.steps.forEach((step) => {
            step.classList.remove('step-hovered', 'step-dimmed');
        });
        
        // Restore text based on current animation state or active selection
        this.restoreDefaultState();
    }
    
    handleStepClick(stepNumber) {
        // If clicking the same active step, deselect it
        if (this.activeStep === stepNumber) {
            this.handleStepDeselect();
            return;
        }
        
        // Set new active step
        this.activeStep = stepNumber;
        
        // Update visual state of steps
        this.steps.forEach((step, index) => {
            step.classList.remove('step-hovered', 'step-dimmed', 'step-active');
            if (index + 1 === stepNumber) {
                step.classList.add('step-active');
            } else {
                step.classList.add('step-dimmed');
            }
        });
        
        // Update text content immediately
        if (this.commercialText && this.residentialText) {
            this.commercialText.textContent = this.textContent[stepNumber].commercial;
            this.residentialText.textContent = this.textContent[stepNumber].residential;
        }
    }
    
    handleStepDeselect() {
        this.activeStep = null;
        
        // Remove all interaction classes
        this.steps.forEach((step) => {
            step.classList.remove('step-hovered', 'step-dimmed', 'step-active');
        });
        
        // Restore default state
        this.restoreDefaultState();
    }
    
    restoreDefaultState() {
        // Restore text based on current animation state
        const currentAnimatedSteps = document.querySelectorAll('.step-item.fade-in').length;
        if (currentAnimatedSteps > 0) {
            const lastStepNumber = currentAnimatedSteps;
            if (this.commercialText && this.residentialText) {
                this.commercialText.textContent = this.textContent[lastStepNumber].commercial;
                this.residentialText.textContent = this.textContent[lastStepNumber].residential;
            }
        }
    }
}

// Services Accordion Functionality
class AccordionServices {
    constructor() {
        this.accordionItems = document.querySelectorAll('.accordion-item');
        this.currentActiveIndex = 0;
        this.autoRotateInterval = null;
        this.autoRotateDelay = 5000; // 5 seconds
        this.isUserInteracting = false;
        
        this.init();
    }
    
    init() {
        if (this.accordionItems.length === 0) return;
        
        this.setupEventListeners();
        this.startAutoRotation();
        
        // Set initial active state
        this.setActiveItem(0);
    }
    
    setupEventListeners() {
        this.accordionItems.forEach((item, index) => {
            // Click to activate
            item.addEventListener('click', (e) => {
                if (!item.classList.contains('active')) {
                    this.handleItemClick(index);
                }
            });
            
            // Pause auto-rotation on hover
            item.addEventListener('mouseenter', () => {
                this.pauseAutoRotation();
            });
            
            item.addEventListener('mouseleave', () => {
                this.resumeAutoRotation();
            });
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                this.goToPrevious();
            } else if (e.key === 'ArrowRight') {
                this.goToNext();
            }
        });
    }
    
    handleItemClick(index) {
        this.isUserInteracting = true;
        this.setActiveItem(index);
        
        // Reset auto-rotation after user interaction
        setTimeout(() => {
            this.isUserInteracting = false;
            this.resumeAutoRotation();
        }, 3000);
    }
    
    setActiveItem(index) {
        if (index < 0 || index >= this.accordionItems.length) return;
        
        // Remove active class from all items
        this.accordionItems.forEach(item => {
            item.classList.remove('active');
        });
        
        // Add active class to selected item
        this.accordionItems[index].classList.add('active');
        this.currentActiveIndex = index;
        
        // Trigger any additional animations or callbacks here
        this.onItemActivated(index);
    }
    
    onItemActivated(index) {
        // Optional: Add any additional functionality when an item becomes active
        const activeItem = this.accordionItems[index];
        const category = activeItem.getAttribute('data-category');
        
        // You could dispatch a custom event here if needed
        document.dispatchEvent(new CustomEvent('accordionItemActivated', {
            detail: { index, category, element: activeItem }
        }));
    }
    
    goToNext() {
        const nextIndex = (this.currentActiveIndex + 1) % this.accordionItems.length;
        this.setActiveItem(nextIndex);
    }
    
    goToPrevious() {
        const prevIndex = this.currentActiveIndex === 0 
            ? this.accordionItems.length - 1 
            : this.currentActiveIndex - 1;
        this.setActiveItem(prevIndex);
    }
    
    startAutoRotation() {
        this.stopAutoRotation(); // Clear any existing interval
        
        this.autoRotateInterval = setInterval(() => {
            if (!this.isUserInteracting) {
                this.goToNext();
            }
        }, this.autoRotateDelay);
    }
    
    stopAutoRotation() {
        if (this.autoRotateInterval) {
            clearInterval(this.autoRotateInterval);
            this.autoRotateInterval = null;
        }
    }
    
    pauseAutoRotation() {
        this.stopAutoRotation();
    }
    
    resumeAutoRotation() {
        if (!this.isUserInteracting) {
            this.startAutoRotation();
        }
    }
    
    // Public method to manually set active item
    activateItem(index) {
        this.handleItemClick(index);
    }
    
    // Public method to get current active item
    getActiveItem() {
        return {
            index: this.currentActiveIndex,
            element: this.accordionItems[this.currentActiveIndex],
            category: this.accordionItems[this.currentActiveIndex]?.getAttribute('data-category')
        };
    }
}

// Initialize components when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new GalleryShowcase();
    new WorksDetailNavigation();
    new StepAnimation();
    
    // Initialize Services Accordion
    window.accordionServices = new AccordionServices();
});

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Form submission handling
const contactForm = document.querySelector('.cta-form form');
if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        // Get form data
        const name = contactForm.querySelector('input[type="text"]').value;
        const email = contactForm.querySelector('input[type="email"]').value;
        const message = contactForm.querySelector('textarea').value;
        
        // Simple validation
        if (!name || !email || !message) {
            alert('Please fill in all required fields.');
            return;
        }
        
        // Simulate form submission
        const submitBtn = contactForm.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Sending...';
        submitBtn.disabled = true;
        
        setTimeout(() => {
            alert('Thank you for your message! We will get back to you soon.');
            contactForm.reset();
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }, 2000);
    });
}

// Contact Modal Functions
function openContactModal() {
    document.getElementById('contactModal').style.display = 'block';
    document.body.style.overflow = 'hidden'; // Prevent background scrolling
}

function closeContactModal() {
    document.getElementById('contactModal').style.display = 'none';
    document.body.style.overflow = 'auto'; // Restore scrolling
}

// Close modal when clicking outside of it
window.onclick = function(event) {
    const modal = document.getElementById('contactModal');
    if (event.target === modal) {
        closeContactModal();
    }
}

// Handle contact form submission
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const phone = document.getElementById('phone').value;
            const projectDetails = document.getElementById('projectDetails').value;
            
            // Basic validation
            if (!firstName || !lastName || !phone || !projectDetails) {
                alert('Please fill in all required fields.');
                return;
            }
            
            // Simulate form submission
            const submitBtn = contactForm.querySelector('.submit-btn');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                alert('Thank you for your message! We will get back to you soon.');
                contactForm.reset();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                closeContactModal();
            }, 2000);
        });
    }
});

// Button click handlers
document.addEventListener('DOMContentLoaded', () => {
    // Portfolio buttons
    const portfolioBtns = document.querySelectorAll('.btn-portfolio');
    portfolioBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelector('.gallery-showcase').scrollIntoView({ behavior: 'smooth' });
        });
    });
    
    // Contact buttons
    const contactBtns = document.querySelectorAll('.btn-contact');
    contactBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelector('#contact').scrollIntoView({ behavior: 'smooth' });
        });
    });
    
    // Project contact button
    const projectContactBtn = document.querySelector('.btn-contact-project');
    if (projectContactBtn) {
        projectContactBtn.addEventListener('click', () => {
            document.querySelector('#contact').scrollIntoView({ behavior: 'smooth' });
        });
    }
    
    // Project button
    const projectBtn = document.querySelector('.btn-project');
    if (projectBtn) {
        projectBtn.addEventListener('click', () => {
            document.querySelector('.gallery-showcase').scrollIntoView({ behavior: 'smooth' });
        });
    }
});

// Intersection Observer for animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe elements for animation
document.addEventListener('DOMContentLoaded', () => {
    const animatedElements = document.querySelectorAll('.intro-text, .services-info, .team-member, .cta-left');
    
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
});

// Add loading animation
window.addEventListener('load', () => {
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.5s ease';
    
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 100);
});

// Keyboard navigation for gallery
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') {
        document.querySelector('.prev-btn')?.click();
    } else if (e.key === 'ArrowRight') {
        document.querySelector('.next-btn')?.click();
    }
});

// Touch/swipe support for mobile gallery
let touchStartX = 0;
let touchEndX = 0;

document.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
});

document.addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    handleSwipe();
});

function handleSwipe() {
    const swipeThreshold = 50;
    const diff = touchStartX - touchEndX;
    
    if (Math.abs(diff) > swipeThreshold) {
        if (diff > 0) {
            // Swipe left - next slide
            document.querySelector('.next-btn')?.click();
        } else {
            // Swipe right - previous slide
            document.querySelector('.prev-btn')?.click();
        }
    }
}

// Utility icons functionality
document.addEventListener('DOMContentLoaded', () => {
    const searchIcon = document.querySelector('.utility-icons .fa-search');
    const cartIcon = document.querySelector('.utility-icons .fa-shopping-cart');
    
    if (searchIcon) {
        searchIcon.addEventListener('click', () => {
            alert('Search functionality coming soon!');
        });
    }
    
    if (cartIcon) {
        cartIcon.addEventListener('click', () => {
            alert('Shopping cart functionality coming soon!');
        });
    }
}); 

// Testimonials Cycling Functionality
class TestimonialsCycler {
    constructor() {
        this.testimonialItems = document.querySelectorAll('.testimonial-item');
        this.indicators = document.querySelectorAll('.indicator');
        this.currentIndex = 0;
        this.autoRotateInterval = null;
        this.isHovered = false;
        this.cycleDelay = 6000; // 6 seconds between transitions
        
        this.init();
    }
    
    init() {
        if (this.testimonialItems.length === 0) return;
        
        this.setupIndicatorHandlers();
        this.setupHoverHandlers();
        this.startAutoRotation();
    }
    
    setupIndicatorHandlers() {
        this.indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                this.goToTestimonial(index);
                this.resetAutoRotation();
            });
        });
    }
    
    setupHoverHandlers() {
        const testimonialsSection = document.querySelector('.testimonials');
        if (testimonialsSection) {
            testimonialsSection.addEventListener('mouseenter', () => {
                this.isHovered = true;
                this.stopAutoRotation();
            });
            
            testimonialsSection.addEventListener('mouseleave', () => {
                this.isHovered = false;
                this.startAutoRotation();
            });
        }
    }
    
    goToTestimonial(index) {
        // Remove active class from current items
        this.testimonialItems[this.currentIndex].classList.remove('active');
        this.indicators[this.currentIndex].classList.remove('active');
        
        // Update current index
        this.currentIndex = index;
        
        // Add active class to new items
        this.testimonialItems[this.currentIndex].classList.add('active');
        this.indicators[this.currentIndex].classList.add('active');
    }
    
    nextTestimonial() {
        const nextIndex = (this.currentIndex + 1) % this.testimonialItems.length;
        this.goToTestimonial(nextIndex);
    }
    
    startAutoRotation() {
        if (this.isHovered) return;
        
        this.stopAutoRotation(); // Clear any existing interval
        this.autoRotateInterval = setInterval(() => {
            if (!this.isHovered) {
                this.nextTestimonial();
            }
        }, this.cycleDelay);
    }
    
    stopAutoRotation() {
        if (this.autoRotateInterval) {
            clearInterval(this.autoRotateInterval);
            this.autoRotateInterval = null;
        }
    }
    
    resetAutoRotation() {
        this.stopAutoRotation();
        setTimeout(() => {
            if (!this.isHovered) {
                this.startAutoRotation();
            }
        }, this.cycleDelay); // Wait full cycle time before resuming auto-rotation
    }
}

// Initialize testimonials when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new TestimonialsCycler();
});