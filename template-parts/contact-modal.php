<?php
/**
 * Template part for displaying contact modal
 * Used across all pages as a global element
 */
?>

<!-- Contact Modal -->
<div id="contactModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeContactModal()">&times;</span>
        <h2><?php echo esc_html(get_theme_mod('contact_modal_title', 'Contact Us')); ?></h2>
        <form id="contactForm" class="contact-form">
            <div class="form-row">
                <div class="form-group">
                    <label for="firstName"><?php echo esc_html(get_theme_mod('contact_modal_first_name_label', 'First Name')); ?> *</label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>
                <div class="form-group">
                    <label for="lastName"><?php echo esc_html(get_theme_mod('contact_modal_last_name_label', 'Last Name')); ?> *</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
            </div>
            <div class="form-group">
                <label for="phone"><?php echo esc_html(get_theme_mod('contact_modal_phone_label', 'Phone Number')); ?> *</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="projectDetails"><?php echo esc_html(get_theme_mod('contact_modal_project_label', 'Details About Project')); ?> *</label>
                <textarea id="projectDetails" name="projectDetails" rows="5" required placeholder="<?php echo esc_attr(get_theme_mod('contact_modal_placeholder', 'Tell us about your project...')); ?>"></textarea>
            </div>
            <button type="submit" class="submit-btn"><?php echo esc_html(get_theme_mod('contact_modal_submit_text', 'Send Message')); ?></button>
        </form>
    </div>
</div> 