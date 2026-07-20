<?php

/**
 * Theme Support and Setup
 *
 * @package helium-fdn
 */

if (!function_exists('helium_fdn_theme_setup')) {
    function helium_fdn_theme_setup()
    {
        // Translation support
        load_theme_textdomain('helium-fdn', get_template_directory() . '/languages');

        // Other theme support (e.g., post thumbnails, menus)
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
    }
}
add_action('after_setup_theme', 'helium_fdn_theme_setup');


function helium_fdn_customizer($wp_customize)
{
    $wp_customize->add_setting('layout_style', array('default' => 'default'));
    $wp_customize->add_control('layout_style', array(
        'label' => __('Layout Style', 'helium-fdn'),
        'section' => 'layout_options',
        'type' => 'select',
        'choices' => array(
            'default' => 'Default',
            'sidebar' => 'Sidebar'
        )
    ));
    $wp_customize->add_section('layout_options', array('title' => __('Layout Options', 'helium-fdn')));
}
add_action('customize_register', 'helium_fdn_customizer');


// Prevent Direct Template Loading
function helium_fdn_force_page_template($template)
{
    if (is_page() && get_page_template_slug()) {
        $template = locate_template('page.php');
    }
    return $template;
}
add_filter('template_include', 'helium_fdn_force_page_template', 99);

// Gravity Forms — mortgages form
// GF form ID: find it at Gravity Forms → Forms, hover the form name and check the URL (?id=X)
add_action('wp_ajax_submit_mortgage_to_gravity_forms', 'handle_mortgage_gf_submission');
add_action('wp_ajax_nopriv_submit_mortgage_to_gravity_forms', 'handle_mortgage_gf_submission');

function handle_mortgage_gf_submission()
{
    check_ajax_referer('submit_mortgage_gf_nonce', 'nonce');

    $rawFormData = isset($_POST['formData']) ? $_POST['formData'] : '';
    $formData = json_decode(stripslashes(urldecode($rawFormData)), true);

    if (json_last_error() !== JSON_ERROR_NONE || !is_array($formData)) {
        wp_send_json_error('Invalid form data');
    }

    // Replace with your Gravity Forms Mortgages form ID
    $gf_form_id = 1;

    $input_values = array(
        'input_1'  => isset($formData['mortgageType']) ? ucwords(str_replace('-', ' ', $formData['mortgageType'])) : '',
        'input_3'  => isset($formData['reason']) ? ucwords(str_replace('-', ' ', $formData['reason'])) : '',
        'input_4'  => isset($formData['propertyPrice']) ? (int) $formData['propertyPrice'] : 0,
        'input_5'  => isset($formData['loanAmount']) ? (int) $formData['loanAmount'] : 0,
        'input_6'  => isset($formData['currentMortgageOutstanding']) ? (int) $formData['currentMortgageOutstanding'] : 0,
        'input_7'  => isset($formData['additionalLoanAmount']) ? (int) $formData['additionalLoanAmount'] : 0,
        'input_8'  => isset($formData['mortgageTerm']) ? (int) $formData['mortgageTerm'] : 0,
        'input_9'  => isset($formData['additionalInfo']) ? sanitize_textarea_field($formData['additionalInfo']) : '',
        'input_10' => isset($formData['firstName']) ? sanitize_text_field($formData['firstName']) : '',
        'input_11' => isset($formData['lastName']) ? sanitize_text_field($formData['lastName']) : '',
        'input_12' => isset($formData['email']) ? sanitize_email($formData['email']) : '',
        'input_13' => isset($formData['employmentStatus']) ? ucwords(str_replace('-', ' ', $formData['employmentStatus'])) : '',
        'input_14' => isset($formData['grossAnnualIncome']) ? (int) $formData['grossAnnualIncome'] : 0,
        'input_15' => isset($formData['phone']) ? sanitize_text_field($formData['phone']) : '',
        'input_16' => isset($formData['postCode']) ? sanitize_text_field($formData['postCode']) : '',
        'input_17' => isset($formData['city']) ? sanitize_text_field($formData['city']) : '',
        'input_18' => isset($formData['country']) ? sanitize_text_field($formData['country']) : 'United Kingdom',
    );

    if (!class_exists('GFAPI')) {
        wp_send_json_error('Gravity Forms not active');
    }

    $result = GFAPI::submit_form($gf_form_id, $input_values);

    if (is_wp_error($result)) {
        wp_send_json_error($result->get_error_message());
    }

    wp_send_json_success(array('entry_id' => $result['entry_id']));
    wp_die();
}


// Gravity Forms — protection form
// GF form ID: find it at Gravity Forms → Forms, hover the form name and check the URL (?id=X)
add_action('wp_ajax_submit_protection_to_gravity_forms', 'handle_protection_gf_submission');
add_action('wp_ajax_nopriv_submit_protection_to_gravity_forms', 'handle_protection_gf_submission');

function handle_protection_gf_submission()
{
    check_ajax_referer('submit_protection_gf_nonce', 'nonce');

    $rawFormData = isset($_POST['formData']) ? $_POST['formData'] : '';
    $formData = json_decode(stripslashes(urldecode($rawFormData)), true);

    if (json_last_error() !== JSON_ERROR_NONE || !is_array($formData)) {
        wp_send_json_error('Invalid form data');
    }

    // Replace with your Gravity Forms Protection form ID
    $gf_form_id = 2;

    $input_values = array(
        'input_1'  => isset($formData['protectionOption']) ? ucwords(str_replace('-', ' ', $formData['protectionOption'])) : '',
        'input_3'  => isset($formData['coverAmount']) ? (int) $formData['coverAmount'] : 0,
        'input_4'  => isset($formData['coverTerm']) ? (int) $formData['coverTerm'] : 0,
        'input_5'  => isset($formData['firstName']) ? sanitize_text_field($formData['firstName']) : '',
        'input_6'  => isset($formData['lastName']) ? sanitize_text_field($formData['lastName']) : '',
        'input_7'  => isset($formData['phone']) ? sanitize_text_field($formData['phone']) : '',
        'input_8'  => isset($formData['email']) ? sanitize_email($formData['email']) : '',
        'input_9'  => isset($formData['dob']) ? sanitize_text_field($formData['dob']) : '',
        'input_10' => isset($formData['smokerStatus']) ? ucwords(str_replace('-', ' ', $formData['smokerStatus'])) : '',
        'input_11' => isset($formData['employmentStatus']) ? ucwords(str_replace('-', ' ', $formData['employmentStatus'])) : '',
        'input_12' => isset($formData['grossAnnualIncome']) ? (int) $formData['grossAnnualIncome'] : 0,
        'input_13' => isset($formData['additionalInfo']) ? sanitize_textarea_field($formData['additionalInfo']) : '',
        'input_14' => isset($formData['postCode']) ? sanitize_text_field($formData['postCode']) : '',
        'input_15' => isset($formData['city']) ? sanitize_text_field($formData['city']) : '',
        'input_16' => isset($formData['country']) ? sanitize_text_field($formData['country']) : 'United Kingdom',
    );

    if (!class_exists('GFAPI')) {
        wp_send_json_error('Gravity Forms not active');
    }

    $result = GFAPI::submit_form($gf_form_id, $input_values);

    if (is_wp_error($result)) {
        wp_send_json_error($result->get_error_message());
    }

    wp_send_json_success(array('entry_id' => $result['entry_id']));
    wp_die();
}
