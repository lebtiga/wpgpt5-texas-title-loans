/**
 * High-Converting Sales Page JavaScript
 * Calculator and conversion tracking for iframe form
 */

(function() {
    'use strict';
    
    // Loan Calculator
    const valueSlider = document.getElementById('value-slider');
    const vehicleValue = document.getElementById('vehicle-value');
    const loanAmount = document.getElementById('loan-amount');
    
    if (valueSlider) {
        valueSlider.addEventListener('input', function() {
            const value = parseInt(this.value);
            const loanValue = Math.round(value * 0.5); // 50% of vehicle value
            
            vehicleValue.textContent = '$' + value.toLocaleString();
            if (loanAmount) {
                loanAmount.textContent = '$' + loanValue.toLocaleString();
            }
        });
    }
    
    // Smooth scroll to iframe form
    document.querySelectorAll('a[href="#apply"], a[href="#instant-quote"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const iframeContainer = document.querySelector('.mobile-center-wrapper');
            if (iframeContainer) {
                iframeContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
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
    
    // Track iframe form visibility
    const observer = new IntersectionObserver((entries) => {
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
    }, { threshold: 0.5 });
    
    const iframeContainer = document.querySelector('.iphone-container-responsive');
    if (iframeContainer) {
        observer.observe(iframeContainer);
    }
    
    // Mobile responsiveness check
    function checkMobileResponsiveness() {
        const container = document.querySelector('.iphone-container-responsive');
        if (container && window.innerWidth < 375) {
            container.style.transform = 'scale(0.85)';
        } else if (container && window.innerWidth < 320) {
            container.style.transform = 'scale(0.75)';
        } else if (container) {
            container.style.transform = 'scale(1)';
        }
    }
    
    // Check on load and resize
    checkMobileResponsiveness();
    window.addEventListener('resize', checkMobileResponsiveness);
    
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