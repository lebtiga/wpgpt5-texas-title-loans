<?php
/**
 * Template Part: FAQ Section
 * Reusable FAQ accordion component
 */
if (!defined('ABSPATH')) { exit; }

// Default FAQs - can be overridden by passing $faqs variable
if (!isset($faqs)) {
    $faqs = [
        [
            'question' => 'How quickly can I get a title loan in Texas?',
            'answer' => 'Most Texas title loan applications are approved within hours, and you can receive your funds the same day. Our online application takes just minutes to complete.'
        ],
        [
            'question' => 'Can I get a title loan with bad credit in Texas?',
            'answer' => 'Yes! Title loans in Texas don\'t require credit checks. We base approval on your vehicle\'s value and your ability to repay, not your credit score.'
        ],
        [
            'question' => 'Do I keep my car during the title loan?',
            'answer' => 'Absolutely! You continue driving your vehicle throughout the entire loan term. We only hold your title as collateral, not your car.'
        ],
        [
            'question' => 'What vehicles qualify for title loans in Texas?',
            'answer' => 'We accept titles for cars, trucks, SUVs, motorcycles, RVs, and commercial vehicles. The vehicle must be paid off, titled in your name, and in working condition.'
        ],
        [
            'question' => 'Are title loans legal in Texas?',
            'answer' => 'Yes, title loans are legal and regulated in Texas under Chapter 393 of the Texas Finance Code. We operate in full compliance with all state regulations.'
        ]
    ];
}
?>

<section class="faqs" id="faqs">
    <div class="container">
        <h2 class="section__title">Frequently Asked Questions</h2>
        <div class="accordion" data-accordion>
            <?php foreach ($faqs as $faq) : ?>
            <div class="accordion__item">
                <button class="accordion__trigger"><?php echo esc_html($faq['question']); ?></button>
                <div class="accordion__content">
                    <p><?php echo esc_html($faq['answer']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
// FAQ Accordion functionality
document.addEventListener('DOMContentLoaded', function() {
    const triggers = document.querySelectorAll('.accordion__trigger');
    
    triggers.forEach(trigger => {
        trigger.addEventListener('click', function() {
            const item = this.parentElement;
            const wasOpen = item.classList.contains('is-open');
            
            // Close all items
            document.querySelectorAll('.accordion__item').forEach(i => {
                i.classList.remove('is-open');
            });
            
            // Open clicked item if it wasn't open
            if (!wasOpen) {
                item.classList.add('is-open');
            }
        });
    });
});
</script>