/**
 * High-Converting Sales Page JavaScript
 * Calculator and conversion tracking for iframe form
 */

(function() {
    'use strict';
    
    // Loan Calculator - optimized to prevent reflows
    const valueSlider = document.getElementById('value-slider');
    const vehicleValue = document.getElementById('vehicle-value');
    const loanAmount = document.getElementById('loan-amount');
    
    if (valueSlider) {
        let updateTimeout;
        
        valueSlider.addEventListener('input', function() {
            // Debounce updates to prevent excessive reflows
            clearTimeout(updateTimeout);
            updateTimeout = setTimeout(() => {
                requestAnimationFrame(() => {
                    const value = parseInt(this.value);
                    const loanValue = Math.round(value * 0.5); // 50% of vehicle value
                    
                    vehicleValue.textContent = '$' + value.toLocaleString();
                    if (loanAmount) {
                        loanAmount.textContent = '$' + loanValue.toLocaleString();
                    }
                });
            }, 50);
        });
    }
    
    // Smooth scroll to iframe form - optimized
    document.querySelectorAll('a[href="#apply"], a[href="#instant-quote"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            requestAnimationFrame(() => {
                const iframeContainer = document.querySelector('.mobile-center-wrapper');
                if (iframeContainer) {
                    iframeContainer.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'center',
                        inline: 'nearest'
                    });
                }
            });
        }, { passive: false });
    });
    
    // Exit Intent Popup
    let exitIntentShown = false;
    document.addEventListener('mouseleave', function(e) {
        if (e.clientY <= 0 && !exitIntentShown) {
            exitIntentShown = true;
            showExitPopup();
        }
    });
    
    function showExitPopup() {
        const popup = document.getElementById('exit-popup');
        if (popup) {
            popup.style.display = 'flex';
        }
    }
    
    // Close exit popup
    const closeButton = document.querySelector('.exit-popup__close');
    if (closeButton) {
        closeButton.addEventListener('click', function() {
            document.getElementById('exit-popup').style.display = 'none';
        });
    }
    
    // Track iframe form visibility - optimized
    const observerCallback = (entries) => {
        requestAnimationFrame(() => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Track form view
                    console.log('Form iframe is now visible');
                    
                    // Optional: Send analytics event
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'view_form', {
                            'event_category': 'engagement',
                            'event_label': 'iPhone Form View'
                        });
                    }
                }
            });
        });
    };
    
    const observer = new IntersectionObserver(observerCallback, { 
        threshold: 0.5,
        rootMargin: '0px'
    });
    
    const iframeContainer = document.querySelector('.iphone-container-responsive');
    if (iframeContainer) {
        observer.observe(iframeContainer);
    }
    
    // Mobile responsiveness check - optimized to prevent forced reflows
    let resizeTimeout;
    let cachedWidth = window.innerWidth;
    
    function checkMobileResponsiveness() {
        // Use requestAnimationFrame to batch DOM reads/writes
        requestAnimationFrame(() => {
            const container = document.querySelector('.iphone-container-responsive');
            if (!container) return;
            
            const width = cachedWidth;
            let scale = 1;
            
            if (width < 320) {
                scale = 0.75;
            } else if (width < 375) {
                scale = 0.85;
            }
            
            // Only update if scale changed
            const currentTransform = container.style.transform;
            const newTransform = `scale(${scale})`;
            if (currentTransform !== newTransform) {
                container.style.transform = newTransform;
            }
        });
    }
    
    // Debounced resize handler to prevent excessive reflows
    function handleResize() {
        cachedWidth = window.innerWidth;
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(checkMobileResponsiveness, 150);
    }
    
    // Check on load
    checkMobileResponsiveness();
    
    // Use passive listener for better performance
    window.addEventListener('resize', handleResize, { passive: true });
    
    // Update countdown timer (if exists)
    const updateCountdown = () => {
        const now = new Date();
        const closingTime = new Date();
        closingTime.setHours(17, 0, 0); // 5 PM CST
        
        if (now > closingTime) {
            closingTime.setDate(closingTime.getDate() + 1);
        }
        
        const diff = closingTime - now;
        const hours = Math.floor(diff / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        
        const countdownElement = document.querySelector('.countdown-timer');
        if (countdownElement) {
            countdownElement.textContent = `${hours}h ${minutes}m remaining today`;
        }
    };
    
    // Update countdown every minute
    updateCountdown();
    setInterval(updateCountdown, 60000);
    
})();