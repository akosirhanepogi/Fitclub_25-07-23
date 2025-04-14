document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for navigation links
    document.querySelectorAll('nav a').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Explore Program Navigation
    const exploreGrid = document.querySelector('.explore__grid');
    const explorePrev = document.getElementById('explorePrev');
    const exploreNext = document.getElementById('exploreNext');
    
    if (exploreGrid && explorePrev && exploreNext) {
        explorePrev.addEventListener('click', () => {
            exploreGrid.scrollBy({ left: -300, behavior: 'smooth' });
        });
        
        exploreNext.addEventListener('click', () => {
            exploreGrid.scrollBy({ left: 300, behavior: 'smooth' });
        });
    }

    // Review Navigation
    const reviewPrev = document.getElementById('reviewPrev');
    const reviewNext = document.getElementById('reviewNext');
    
    if (reviewPrev && reviewNext) {
        // In a real implementation, this would cycle through different reviews
        reviewPrev.addEventListener('click', () => {
            alert('Previous review would show here');
        });
        
        reviewNext.addEventListener('click', () => {
            alert('Next review would show here');
        });
    }

    // Button Click Handlers
    const joinNowBtn = document.getElementById('joinNowBtn');
    const getStartedBtn = document.getElementById('getStartedBtn');
    const bookClassBtn = document.getElementById('bookClassBtn');
    const programJoinBtns = document.querySelectorAll('.program-join-btn');
    const priceBtns = document.querySelectorAll('.price__btn');
    
    if (joinNowBtn) {
        joinNowBtn.addEventListener('click', () => {
            window.scrollTo({
                top: document.querySelector('#service').offsetTop - 80,
                behavior: 'smooth'
            });
        });
    }
    
    if (getStartedBtn) {
        getStartedBtn.addEventListener('click', () => {
            window.scrollTo({
                top: document.querySelector('#program').offsetTop - 80,
                behavior: 'smooth'
            });
        });
    }
    
    if (bookClassBtn) {
        bookClassBtn.addEventListener('click', () => {
            alert('Booking system would open here');
        });
    }
    
    programJoinBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            alert('Program signup would open here');
        });
    });
    
    priceBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const plan = btn.getAttribute('data-plan');
            alert(`Signup for ${plan} plan would open here`);
        });
    });

    // Active link highlighting based on scroll position
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('nav .link a');
    
    window.addEventListener('scroll', () => {
        let current = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            
            if (pageYOffset >= (sectionTop - 150)) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    });

    // Mobile menu toggle (would need additional HTML/CSS)
    // This is a placeholder for mobile menu functionality
    const mobileMenuBtn = document.createElement('button');
    mobileMenuBtn.innerHTML = '<i class="ri-menu-line"></i>';
    mobileMenuBtn.classList.add('mobile-menu-btn');
    document.querySelector('nav').appendChild(mobileMenuBtn);
    
    mobileMenuBtn.addEventListener('click', () => {
        const navLinks = document.querySelector('.nav__links');
        navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
    });
});
