<?php
/**
 * Template Part: Quote Form
 * Reusable form component for all pages
 */
if (!defined('ABSPATH')) { exit; }
?>
<div class="formcard">
    <h2 class="formcard__title">Start Your Free Quote</h2>
    <!-- Image removed for performance - using CSS styling instead -->
    <form class="form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post" id="title-loan-form">
        <?php wp_nonce_field('title_loan_quote', 'quote_nonce'); ?>
        <input type="hidden" name="action" value="submit_title_loan_quote">
        
        <div class="form__row">
            <label for="f-year" class="sr-only">Vehicle Year</label>
            <select id="f-year" name="vehicle_year" class="input" required>
                <option value="">Vehicle Year</option>
                <?php 
                $current_year = date('Y');
                for ($year = $current_year; $year >= $current_year - 20; $year--) {
                    echo '<option value="' . $year . '">' . $year . '</option>';
                }
                ?>
                <option value="older">Older than <?php echo ($current_year - 20); ?></option>
            </select>
        </div>
        <div class="form__row">
            <label for="f-make" class="sr-only">Make</label>
            <input id="f-make" name="vehicle_make" class="input" type="text" placeholder="Make" required />
        </div>
        <div class="form__row">
            <label for="f-model" class="sr-only">Model</label>
            <input id="f-model" name="vehicle_model" class="input" type="text" placeholder="Model" required />
        </div>
        <div class="form__row">
            <label for="f-mileage" class="sr-only">Estimated Mileage</label>
            <input id="f-mileage" name="vehicle_mileage" class="input" type="number" placeholder="Estimated Mileage" required />
        </div>
        <button class="button button--primary button--block" type="submit">Next</button>
        <p class="formcard__trust">Secure • Encrypted • No obligation</p>
    </form>
</div>