/**
 * High-Converting Sales Page JavaScript
 * Progressive form, calculator, and conversion tracking
 */

(function() {
    'use strict';
    
    // Progressive Form Handler
    const form = document.getElementById('title-loan-form');
    const formSteps = document.querySelectorAll('.form-step');
    const progressBar = document.querySelector('.form-progress__bar');
    const progressText = document.querySelector('.form-progress__text');
    let currentStep = 1;
    
    // Handle Next Step buttons
    document.querySelectorAll('.next-step').forEach(button => {
        button.addEventListener('click', function() {
            if (validateStep(currentStep)) {
                currentStep++;
                showStep(currentStep);
                updateProgress(currentStep);
                
                // Update loan estimate based on vehicle year
                if (currentStep === 2) {
                    updateLoanEstimate();
                }
            }
        });
    });
    
    // Show specific step
    function showStep(step) {
        formSteps.forEach(s => s.classList.remove('active'));
        document.querySelector(`[data-step="${step}"]`).classList.add('active');
        
        // Scroll to form
        document.getElementById('instant-quote').scrollIntoView({ behavior: 'smooth' });
    }
    
    // Update progress bar
    function updateProgress(step) {
        const progress = (step / 3) * 100;
        progressBar.style.width = progress + '%';
        progressText.textContent = `Step ${step} of 3`;
    }
    
    // Validate current step
    function validateStep(step) {
        const currentStepElement = document.querySelector(`[data-step="${step}"]`);
        const inputs = currentStepElement.querySelectorAll('input[required], select[required]');
        
        for (let input of inputs) {
            if (!input.value) {
                input.classList.add('error');
                input.focus();
                return false;
            }
            input.classList.remove('error');
        }
        return true;
    }
    
    // Update loan estimate based on vehicle year
    function updateLoanEstimate() {
        const year = document.getElementById('vehicle-year').value;
        const currentYear = new Date().getFullYear();
        const age = currentYear - parseInt(year);
        
        let minLoan = 2500;
        let maxLoan = 15000;
        
        if (age <= 5) {
            minLoan = 5000;
            maxLoan = 25000;
        } else if (age <= 10) {
            minLoan = 3500;
            maxLoan = 15000;
        } else if (age <= 15) {
            minLoan = 2500;
            maxLoan = 10000;
        } else {
            minLoan = 1500;
            maxLoan = 7500;
        }
        
        document.querySelector('.loan-estimate__amount').textContent = 
            `$${minLoan.toLocaleString()} - $${maxLoan.toLocaleString()}`;
    }
    
    // Form submission
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (validateStep(3)) {
                // Track conversion
                trackConversion();
                
                // Show success message
                showSuccessMessage();
                
                // In production, this would submit to backend
                console.log('Form submitted:', getFormData());
            }
        });
    }
    
    // Get form data
    function getFormData() {
        return {
            zip: document.getElementById('zip').value,
            vehicleYear: document.getElementById('vehicle-year').value,
            vehicleMake: document.getElementById('vehicle-make').value,
            vehicleModel: document.getElementById('vehicle-model').value,
            fullName: document.getElementById('full-name').value,
            phone: document.getElementById('phone').value,
            email: document.getElementById('email').value,
            timestamp: new Date().toISOString()
        };
    }
    
    // Show success message
    function showSuccessMessage() {
        const formCard = document.querySelector('.form-card');
        formCard.innerHTML = `
            <div class="success-message">
                <div class="success-icon">✅</div>
                <h2>Application Received!</h2>
                <p>A loan specialist will call you within 15 minutes.</p>
                <p class="success-phone">Or call now: <a href="tel:18882248177">888-224-8177</a></p>
            </div>
        `;
    }
    
    // Loan Calculator
    const valueSlider = document.getElementById('value-slider');
    const vehicleValue = document.getElementById('vehicle-value');
    const loanAmount = document.getElementById('loan-amount');
    const monthlyPayment = document.getElementById('monthly-payment');
    
    if (valueSlider) {
        valueSlider.addEventListener('input', function() {
            const value = parseInt(this.value);
            vehicleValue.textContent = `$${value.toLocaleString()}`;
            
            // Calculate loan amount (25-50% of vehicle value)
            const minLoan = Math.floor(value * 0.25);
            const maxLoan = Math.floor(value * 0.50);
            loanAmount.textContent = `$${minLoan.toLocaleString()} - $${maxLoan.toLocaleString()}`;
            
            // Calculate monthly payment (rough estimate)
            const avgLoan = (minLoan + maxLoan) / 2;
            const monthlyMin = Math.floor(avgLoan / 36); // 36 month term
            const monthlyMax = Math.floor(avgLoan / 12); // 12 month term
            monthlyPayment.textContent = `$${monthlyMin}/mo - $${monthlyMax}/mo`;
        });
    }
    
    // Exit Intent Popup
    let exitIntentShown = false;
    
    document.addEventListener('mouseleave', function(e) {
        if (e.clientY <= 0 && !exitIntentShown) {
            showExitPopup();
            exitIntentShown = true;
        }
    });
    
    // Mobile exit intent (user scrolls up quickly)
    let lastScrollTop = 0;
    let scrollTimer = null;
    
    window.addEventListener('scroll', function() {
        clearTimeout(scrollTimer);
        scrollTimer = setTimeout(function() {
            const st = window.pageYOffset || document.documentElement.scrollTop;
            if (st < lastScrollTop - 50 && st < 100 && !exitIntentShown) {
                showExitPopup();
                exitIntentShown = true;
            }
            lastScrollTop = st <= 0 ? 0 : st;
        }, 100);
    });
    
    function showExitPopup() {
        const popup = document.getElementById('exit-popup');
        if (popup) {
            popup.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    }
    
    // Close exit popup
    const exitClose = document.querySelector('.exit-popup__close');
    if (exitClose) {
        exitClose.addEventListener('click', function() {
            document.getElementById('exit-popup').style.display = 'none';
            document.body.style.overflow = '';
        });
    }
    
    // Click outside to close popup
    const exitPopup = document.getElementById('exit-popup');
    if (exitPopup) {
        exitPopup.addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
                document.body.style.overflow = '';
            }
        });
    }
    
    // Dynamic countdown timer
    function updateCountdown() {
        const now = new Date();
        const deadline = new Date();
        deadline.setHours(17, 0, 0, 0); // 5 PM
        
        if (now > deadline) {
            deadline.setDate(deadline.getDate() + 1);
        }
        
        const diff = deadline - now;
        const hours = Math.floor(diff / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        
        const countdownElements = document.querySelectorAll('.countdown-timer');
        countdownElements.forEach(el => {
            el.textContent = `${hours}h ${minutes}m`;
        });
    }
    
    // Update countdown every minute
    updateCountdown();
    setInterval(updateCountdown, 60000);
    
    // Live visitor counter
    function updateVisitorCount() {
        const min = 12;
        const max = 23;
        const count = Math.floor(Math.random() * (max - min + 1)) + min;
        
        const viewerElements = document.querySelectorAll('.urgency-banner__viewers');
        viewerElements.forEach(el => {
            el.textContent = `👥 ${count} people viewing now`;
        });
    }
    
    // Update visitor count every 30 seconds
    updateVisitorCount();
    setInterval(updateVisitorCount, 30000);
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
    
    // Track conversions
    function trackConversion() {
        // Google Analytics event
        if (typeof gtag !== 'undefined') {
            gtag('event', 'conversion', {
                'event_category': 'Lead',
                'event_label': 'Title Loan Application',
                'value': 1
            });
        }
        
        // Facebook Pixel
        if (typeof fbq !== 'undefined') {
            fbq('track', 'Lead');
        }
        
        // Custom tracking
        console.log('Conversion tracked');
    }
    
    // Track form field interactions
    document.querySelectorAll('.form-input').forEach(input => {
        input.addEventListener('focus', function() {
            if (typeof gtag !== 'undefined') {
                gtag('event', 'form_field_focus', {
                    'event_category': 'Engagement',
                    'event_label': this.id
                });
            }
        });
    });
    
    // Phone number formatting
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 0) {
                if (value.length <= 3) {
                    value = `(${value}`;
                } else if (value.length <= 6) {
                    value = `(${value.slice(0, 3)}) ${value.slice(3)}`;
                } else {
                    value = `(${value.slice(0, 3)}) ${value.slice(3, 6)}-${value.slice(6, 10)}`;
                }
            }
            e.target.value = value;
        });
    }
    
    // Add floating labels effect
    document.querySelectorAll('.form-input').forEach(input => {
        if (input.value) {
            input.parentElement.classList.add('has-value');
        }
        
        input.addEventListener('blur', function() {
            if (this.value) {
                this.parentElement.classList.add('has-value');
            } else {
                this.parentElement.classList.remove('has-value');
            }
        });
    });
    
    // Auto-populate make/model suggestions
    const vehicleMakes = ['Ford', 'Chevrolet', 'Toyota', 'Honda', 'Nissan', 'Dodge', 'GMC', 'Jeep', 'Ram', 'Hyundai'];
    
    const makeInput = document.getElementById('vehicle-make');
    if (makeInput) {
        const datalist = document.createElement('datalist');
        datalist.id = 'make-suggestions';
        vehicleMakes.forEach(make => {
            const option = document.createElement('option');
            option.value = make;
            datalist.appendChild(option);
        });
        document.body.appendChild(datalist);
        makeInput.setAttribute('list', 'make-suggestions');
    }
    
    // Add urgency animations
    function pulseUrgencyElements() {
        document.querySelectorAll('.urgency-banner, .btn-primary').forEach(el => {
            el.style.animation = 'none';
            setTimeout(() => {
                el.style.animation = '';
            }, 10);
        });
    }
    
    // Pulse every 10 seconds
    setInterval(pulseUrgencyElements, 10000);
    
    // Initialize on DOM ready
    console.log('Sales page initialized');
    
})();