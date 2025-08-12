<?php
/**
 * Accessibility Fixes for Texas Title Loans
 * Fixes color contrast and form label issues
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add accessibility CSS fixes
 */
add_action('wp_head', function() {
    ?>
    <style id="accessibility-fixes">
        /* Fix footer color contrast issues */
        .site-footer {
            background: #1a1a1a !important; /* Darker background for better contrast */
            color: #ffffff !important;
        }
        
        .site-footer a,
        .footer-links a {
            color: #9db4ff !important; /* Lighter blue for better contrast on dark background */
            text-decoration: underline;
        }
        
        .site-footer a:hover,
        .footer-links a:hover {
            color: #ffffff !important;
        }
        
        .footer-title {
            color: #ffffff !important;
            font-weight: 700;
        }
        
        .footer-bottom {
            border-top: 1px solid #444;
            padding-top: 20px;
            margin-top: 20px;
        }
        
        .footer-bottom p {
            color: #e0e0e0 !important;
        }
        
        /* Fix form label visibility and association */
        .form-group {
            position: relative;
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block !important;
            margin-bottom: 5px !important;
            color: #333 !important;
            font-weight: 600 !important;
            font-size: 14px !important;
            background: white;
            padding: 0 5px;
            position: absolute;
            top: -10px;
            left: 10px;
            z-index: 1;
        }
        
        .form-input {
            width: 100%;
            padding: 15px;
            padding-top: 18px;
            border: 2px solid #333 !important; /* Darker border for better contrast */
            border-radius: 8px;
            font-size: 16px;
            background: white;
            color: #000 !important;
        }
        
        .form-input:focus {
            border-color: #bf0a30 !important;
            outline: 3px solid rgba(191, 10, 48, 0.3) !important;
        }
        
        /* Fix select element styling */
        select.form-input {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            padding-right: 40px;
        }
        
        /* Fix range slider label */
        .calculator-slider label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #333 !important;
        }
        
        #value-slider {
            width: 100%;
            margin-top: 10px;
        }
        
        /* Add screen reader only text for better accessibility */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0,0,0,0);
            white-space: nowrap;
            border: 0;
        }
        
        /* Ensure all interactive elements have focus styles */
        a:focus,
        button:focus,
        input:focus,
        select:focus,
        textarea:focus {
            outline: 3px solid #bf0a30 !important;
            outline-offset: 2px;
        }
        
        /* Fix testimonial text contrast */
        .testimonial-text {
            color: #333 !important;
        }
        
        .testimonial-author span {
            color: #555 !important;
        }
    </style>
    <?php
}, 100);

/**
 * Add proper ARIA labels via JavaScript
 */
add_action('wp_footer', function() {
    if (is_front_page()) {
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add proper labels to form elements
            var vehicleYear = document.getElementById('vehicle-year');
            if (vehicleYear) {
                vehicleYear.setAttribute('aria-label', 'Select your vehicle year');
                vehicleYear.setAttribute('aria-required', 'true');
                
                // Add label element if missing
                if (!vehicleYear.previousElementSibling || vehicleYear.previousElementSibling.tagName !== 'LABEL') {
                    var label = document.createElement('label');
                    label.className = 'form-label';
                    label.setAttribute('for', 'vehicle-year');
                    label.textContent = 'Vehicle Year';
                    vehicleYear.parentNode.insertBefore(label, vehicleYear);
                }
            }
            
            // Fix value slider label
            var valueSlider = document.getElementById('value-slider');
            if (valueSlider) {
                valueSlider.setAttribute('aria-label', 'Select your vehicle value');
                valueSlider.setAttribute('aria-valuemin', '3000');
                valueSlider.setAttribute('aria-valuemax', '50000');
                valueSlider.setAttribute('aria-valuenow', valueSlider.value);
                
                // Update aria-valuenow on change
                valueSlider.addEventListener('input', function() {
                    this.setAttribute('aria-valuenow', this.value);
                });
            }
            
            // Add labels to inputs without them
            var inputs = document.querySelectorAll('.form-input');
            inputs.forEach(function(input) {
                if (!input.getAttribute('aria-label') && input.placeholder) {
                    input.setAttribute('aria-label', input.placeholder);
                }
                
                // Ensure all required fields have aria-required
                if (input.hasAttribute('required')) {
                    input.setAttribute('aria-required', 'true');
                }
            });
            
            // Fix footer link contrast by adding descriptive text
            var footerLinks = document.querySelectorAll('.footer-links a');
            footerLinks.forEach(function(link) {
                if (!link.getAttribute('aria-label')) {
                    link.setAttribute('aria-label', link.textContent + ' - Opens in same window');
                }
            });
        });
        </script>
        <?php
    }
}, 100);