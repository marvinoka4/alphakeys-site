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


// custom formidable morgages form
add_action('wp_ajax_submit_to_formidable', 'handle_formidable_submission');
add_action('wp_ajax_nopriv_submit_to_formidable', 'handle_formidable_submission');

function handle_formidable_submission()
{
    check_ajax_referer('submit_to_formidable_nonce', 'nonce');

    $rawFormData = isset($_POST['formData']) ? $_POST['formData'] : '';
    error_log('Raw POST formData: ' . $rawFormData);

    $decodedRawFormData = urldecode($rawFormData);
    error_log('URL-decoded formData: ' . $decodedRawFormData);

    $cleanedFormData = stripslashes($decodedRawFormData);
    error_log('Cleaned formData (after stripslashes): ' . $cleanedFormData);

    $formData = json_decode($cleanedFormData, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log('JSON decode error: ' . json_last_error_msg());
        error_log('JSON last error code: ' . json_last_error());
    } else {
        error_log('JSON decoded successfully');
    }
    error_log('Decoded formData: ' . print_r($formData, true));

    $form_id = 2;

    $entry_data = array(
        'form_id' => $form_id,
        'item_meta' => array(
            7 => isset($formData['mortgageType']) ? ucwords(str_replace('-', ' ', $formData['mortgageType'])) : '',
            8 => isset($formData['reason']) ? ucwords(str_replace('-', ' ', $formData['reason'])) : '',
            10 => isset($formData['propertyPrice']) ? '£' . number_format((int) $formData['propertyPrice'], 0, '.', ',') : '£0',
            11 => isset($formData['loanAmount']) ? '£' . number_format((int) $formData['loanAmount'], 0, '.', ',') : '£0',
            31 => isset($formData['currentMortgageOutstanding']) ? '£' . number_format((int) $formData['currentMortgageOutstanding'], 0, '.', ',') : '£0',
            32 => isset($formData['additionalLoanAmount']) ? '£' . number_format((int) $formData['additionalLoanAmount'], 0, '.', ',') : '£0',
            12 => isset($formData['mortgageTerm']) ? (int) $formData['mortgageTerm'] . ' years' : '0 years',
            39 => isset($formData['additionalInfo']) ? (string) $formData['additionalInfo'] : '', // Fixed field ID from logs
            13 => isset($formData['firstName']) ? (string) $formData['firstName'] : '',
            14 => isset($formData['lastName']) ? (string) $formData['lastName'] : '',
            15 => isset($formData['email']) ? (string) $formData['email'] : '',
            16 => isset($formData['employmentStatus']) ? ucwords(str_replace('-', ' ', $formData['employmentStatus'])) : '',
            17 => isset($formData['grossAnnualIncome']) ? '£' . number_format((int) $formData['grossAnnualIncome'], 0, '.', ',') : '£0'
        )
    );

    error_log('Entry data to be submitted: ' . print_r($entry_data, true));

    if (class_exists('FrmEntry')) {
        $entry_id = FrmEntry::create($entry_data);
        if ($entry_id) {
            error_log('Entry created with ID: ' . $entry_id);
            wp_send_json_success(array('entry_id' => $entry_id));
        } else {
            error_log('Failed to create entry');
            wp_send_json_error('Failed to create entry');
        }
    } else {
        error_log('Formidable Forms not active');
        wp_send_json_error('Formidable Forms not active');
    }

    wp_die();
}


// custom formidable protection form
add_action('wp_ajax_submit_protection_to_formidable', 'handle_protection_formidable_submission');
add_action('wp_ajax_nopriv_submit_protection_to_formidable', 'handle_protection_formidable_submission');

function handle_protection_formidable_submission()
{
    // Verify nonce
    check_ajax_referer('submit_to_formidable_nonce', 'nonce');

    // Get raw POST data
    $rawFormData = isset($_POST['formData']) ? $_POST['formData'] : '';
    error_log('Raw POST formData: ' . $rawFormData);

    // Decode URL-encoded string
    $decodedRawFormData = urldecode($rawFormData);
    error_log('URL-decoded formData: ' . $decodedRawFormData);

    // Remove backslashes (if double-escaped)
    $cleanedFormData = stripslashes($decodedRawFormData);
    error_log('Cleaned formData (after stripslashes): ' . $cleanedFormData);

    // Decode the JSON string
    $formData = json_decode($cleanedFormData, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log('JSON decode error: ' . json_last_error_msg());
        wp_send_json_error('Invalid form data');
    }
    error_log('Decoded formData: ' . print_r($formData, true));

    // Define the Formidable Form ID
    $form_id = 3;

    // Map formData to Formidable field IDs
    $entry_data = array(
        'form_id' => $form_id,
        'item_meta' => array(
            19 => isset($formData['protectionOption']) ? ucwords(str_replace('-', ' ', $formData['protectionOption'])) : '',
            20 => isset($formData['coverAmount']) ? '£' . number_format((int) $formData['coverAmount'], 0, '.', ',') : '£0',
            21 => isset($formData['coverTerm']) ? (int) $formData['coverTerm'] . ' years' : '0 years',
            22 => isset($formData['firstName']) ? (string) $formData['firstName'] : '',
            23 => isset($formData['lastName']) ? (string) $formData['lastName'] : '',
            24 => isset($formData['phone']) ? '+' . ltrim((string) $formData['phone'], '+') : '',
            25 => isset($formData['email']) ? (string) $formData['email'] : '',
            26 => isset($formData['dob']) ? (string) $formData['dob'] : '',
            27 => isset($formData['smokerStatus']) ? ucwords(str_replace('-', ' ', $formData['smokerStatus'])) : '',
            28 => isset($formData['employmentStatus']) ? ucwords(str_replace('-', ' ', $formData['employmentStatus'])) : '',
            29 => isset($formData['grossAnnualIncome']) ? '£' . number_format((int) $formData['grossAnnualIncome'], 0, '.', ',') : '£0',
            30 => isset($formData['additionalInfo']) ? (string) $formData['additionalInfo'] : ''
        )
    );

    // Log the entry data before submission
    error_log('Entry data to be submitted: ' . print_r($entry_data, true));

    // Create the entry using Formidable's API
    if (class_exists('FrmEntry')) {
        $entry_id = FrmEntry::create($entry_data);
        if ($entry_id) {
            error_log('Entry created with ID: ' . $entry_id);
            wp_send_json_success(array('entry_id' => $entry_id));
        } else {
            error_log('Failed to create entry');
            wp_send_json_error('Failed to create entry');
        }
    } else {
        error_log('Formidable Forms not active');
        wp_send_json_error('Formidable Forms not active');
    }

    wp_die();
}
