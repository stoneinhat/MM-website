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
        this.currentSlide = 0;
        this.slideCount = this.slides.length;
        this.slideWidth = 300 + 32; // slide width + gap
        this.autoPlayInterval = null;
        
        this.init();
    }
    
    init() {
        this.setupEventListeners();
        this.startAutoPlay();
    }
    
    setupEventListeners() {
        this.prevBtn.addEventListener('click', () => this.prevSlide());
        this.nextBtn.addEventListener('click', () => this.nextSlide());
        
        // Pause autoplay on hover
        this.track.addEventListener('mouseenter', () => this.stopAutoPlay());
        this.track.addEventListener('mouseleave', () => this.startAutoPlay());
    }
    
    nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.slideCount;
        this.updateGallery();
    }
    
    prevSlide() {
        this.currentSlide = (this.currentSlide - 1 + this.slideCount) % this.slideCount;
        this.updateGallery();
    }
    
    updateGallery() {
        const translateX = -this.currentSlide * this.slideWidth;
        this.track.style.transform = `translateX(${translateX}px)`;
    }
    
    startAutoPlay() {
        this.autoPlayInterval = setInterval(() => {
            this.nextSlide();
        }, 3000);
    }
    
    stopAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
            this.autoPlayInterval = null;
        }
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

// Initialize components when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new GalleryShowcase();
    new WorksDetailNavigation();
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