<?php

/**
 * Mortgages Form Section (Gravity Forms submission)
 *
 * @package helium-fdn
 */
?>
<section class="grid-container margin-top-2" aria-labelledby="mortgage-form-title">
    <div class="grid-x grid-margin-x align-center-middle">
        <div class="large-10 cell">
            <div id="page" class="site">
                <div class="container">
                    <div class="hide">
                        <!-- Buttons to trigger radios -->
                        <button id="purchase-btn" class="button">Purchase</button>
                        <button id="remortgage-btn" class="button">Remortgage</button>
                        <button id="specialist-lending-btn" class="button">Specialist Lending</button>
                    </div>
                    <div class="form-box" id="form-box">
                        <div class="grid-x align-center-middle">
                            <div class="cell medium-5 small-12 form-progress">
                                <div class="progress-form margin-vertical-1">
                                    <div class="logo text-center margin-bottom-4 hide-for-small-only">
                                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/util/site_logo_.svg" width="200" height="50" alt="Alphakey Mortgages">
                                        </a>
                                    </div>
                                    <ul class="progress-steps align-middle">
                                        <li class="step active">
                                            <span>1</span>
                                            <p>Mortgage <br> <span>please select option complete</span></p>
                                        </li>
                                        <li class="step">
                                            <span>2</span>
                                            <p>Property <br> <span>please select option complete</span></p>
                                        </li>
                                        <li class="step">
                                            <span>3</span>
                                            <p>Applicant <br> <span>please select option complete</span></p>
                                        </li>
                                        <li class="step">
                                            <span>4</span>
                                            <p>Summary <br> <span>please select option complete</span></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cell medium-7 small-12 form-content">
                                <form action="" data-abide novalidate id="mortgageForm" data-page="<?php echo is_page('specialist-lending') ? 'specialist-lending' : 'mortgages'; ?>">
                                    <div data-abide-error class="alert callout" style="display: none;">
                                        <p><i class="fi-alert"></i> Please select required options.</p>
                                    </div>
                                    <div class="form-one form-step active">
                                        <div class="grid-x grid-padding-x align-center-middle mortgage-type">
                                            <fieldset class="medium-12 cell text-center justify-content-center align-center required">
                                                <legend>
                                                    <h2 class="margin-bottom-2">Select Mortgage Type</h2>
                                                </legend>
                                                <div>
                                                    <input type="radio" name="mortgageOption" value="purchase" id="purchase" required>
                                                    <label for="purchase">
                                                        <div class="ins-ft-scroll-icon">
                                                            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/scroll/ic8.svg" alt="Purchase" width="65" height="65">
                                                        </div>
                                                        <span>Purchase</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="mortgageOption" value="remortgage" id="remortgage">
                                                    <label for="remortgage">
                                                        <div class="ins-ft-scroll-icon">
                                                            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/scroll/ic10.svg" alt="Remortgage" width="65" height="65">
                                                        </div>
                                                        <span>Remortgage</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="mortgageOption" value="specialist-lending" id="specialist-lending">
                                                    <label for="specialist-lending">
                                                        <div class="ins-ft-scroll-icon">
                                                            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/scroll/ic5.svg" alt="Specialist Lending" width="65" height="65">
                                                        </div>
                                                        <span>Specialist Lending</span>
                                                    </label>
                                                </div>
                                                <span class="form-error">Mortgage type is required.</span>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-two form-step">
                                        <h2 class="margin-bottom-2">Property Details</h2>
                                        <div class="cell medium-12">
                                            <label>
                                                <legend>Reason for Loan?</legend>
                                                <select id="reason" name="reason" required>
                                                    <option value="">Please Select</option>
                                                    <option value="first-time-buyer">First Time Buyer</option>
                                                    <option value="new-build">New Build</option>
                                                    <option value="standard-purchase">Standard Purchase</option>
                                                    <option value="help-to-buy">Help to Buy</option>
                                                    <option value="right-to-buy">Right to Buy</option>
                                                    <option value="shared-ownership">Shared Ownership</option>
                                                    <option value="home-mover">Home Mover</option>
                                                </select>
                                                <span class="form-error">Reason for loan is required.</span>
                                            </label>
                                        </div>
                                        <div class="grid-container">
                                            <div class="grid-x grid-padding-x">
                                                <div class="medium-12 cell">
                                                    <hr />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cell medium-12">
                                            <div class="grid-x">
                                                <div class="small-4 cell">
                                                    <label for="propertyPrice" class="text-left middle">Property Price</label>
                                                </div>
                                                <div class="small-7 small-offset-1 cell">
                                                    <div class="input-group">
                                                        <span class="input-group-label">£</span>
                                                        <input class="input-group-field" id="propertyPrice" name="propertyPrice" type="number" required pattern="^[0-9]+$" min="1">
                                                        <span class="form-error">Please enter a valid property price.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-x">
                                                <div class="small-4 cell">
                                                    <label for="loanAmount" class="text-left middle">Loan Amount</label>
                                                </div>
                                                <div class="small-7 small-offset-1 cell">
                                                    <div class="input-group">
                                                        <span class="input-group-label">£</span>
                                                        <input class="input-group-field" id="loanAmount" name="loanAmount" type="number" required pattern="^[0-9]+$" min="1">
                                                        <span class="form-error">Please enter a valid loan amount.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-x additional-field" id="currentMortgageOutstandingGroup" style="display: none;">
                                                <div class="small-4 cell">
                                                    <label for="currentMortgageOutstanding" class="text-left middle">Current Mortgage Outstanding</label>
                                                </div>
                                                <div class="small-7 small-offset-1 cell">
                                                    <div class="input-group">
                                                        <span class="input-group-label">£</span>
                                                        <input class="input-group-field" id="currentMortgageOutstanding" name="currentMortgageOutstanding" type="number" pattern="^[0-9]+$" min="0">
                                                        <span class="form-error">Please enter a valid amount.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-x additional-field" id="additionalLoanAmountGroup" style="display: none;">
                                                <div class="small-4 cell">
                                                    <label for="additionalLoanAmount" class="text-left middle">Additional Loan Amount</label>
                                                </div>
                                                <div class="small-7 small-offset-1 cell">
                                                    <div class="input-group">
                                                        <span class="input-group-label">£</span>
                                                        <input class="input-group-field" id="additionalLoanAmount" name="additionalLoanAmount" type="number" pattern="^[0-9]+$" min="0">
                                                        <span class="form-error">Please enter a valid amount.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-x">
                                                <div class="small-4 cell">
                                                    <label for="mortgageTerm" class="text-left middle">Mortgage Term</label>
                                                </div>
                                                <div class="small-7 small-offset-1 cell">
                                                    <div class="input-group">
                                                        <input class="input-group-field" id="mortgageTerm" name="mortgageTerm" type="number" required pattern="^[0-9]+$" min="1">
                                                        <span class="input-group-label">years</span>
                                                        <span class="form-error">Please enter a valid mortgage term.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-three form-step">
                                        <h2 class="margin-bottom-2">Applicant Details</h2>
                                        <div>
                                            <label for="firstName">First Name</label>
                                            <input type="text" id="firstName" name="firstName" placeholder="e.g. John" required>
                                            <span class="form-error">First name is required.</span>
                                        </div>
                                        <div>
                                            <label for="lastName">Last Name</label>
                                            <input type="text" id="lastName" name="lastName" placeholder="e.g. Doe" required>
                                            <span class="form-error">Last name is required.</span>
                                        </div>
                                        <div>
                                            <label for="phone">Phone</label>
                                            <input type="tel" id="phone" name="phone" placeholder="07123456789" required pattern="^0[1-9]\d{9,10}$">
                                            <span class="form-error">Please enter a valid phone number.</span>
                                        </div>
                                        <div>
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" placeholder="e.g. johndoe@gmail.com" required>
                                            <span class="form-error">Please enter a valid email address.</span>
                                        </div>
                                        <div>
                                            <label for="postCode">Post Code</label>
                                            <input type="text" id="postCode" name="postCode" placeholder="e.g. SW1A 1AA" required pattern="^[A-Za-z]{1,2}[0-9][0-9A-Za-z]?\s?[0-9][A-Za-z]{2}$">
                                            <span class="form-error">Please enter a valid UK post code.</span>
                                        </div>
                                        <div>
                                            <label for="city">City</label>
                                            <input type="text" id="city" name="city" placeholder="e.g. London" required>
                                            <span class="form-error">City is required.</span>
                                        </div>
                                        <div>
                                            <label for="country">Country</label>
                                            <input type="text" id="country" name="country" value="United Kingdom" readonly>
                                        </div>
                                        <div class="cell medium-12">
                                            <label>
                                                <legend>Employment Status</legend>
                                                <select id="employmentStatus" name="employmentStatus" required>
                                                    <option value="">Please Select</option>
                                                    <option value="employed">Employed</option>
                                                    <option value="self-employed">Self-employed</option>
                                                    <option value="unemployed">Unemployed</option>
                                                    <option value="retired">Retired</option>
                                                    <option value="director">Director</option>
                                                </select>
                                                <span class="form-error">Employment status is required.</span>
                                            </label>
                                        </div>
                                        <div class="grid-x">
                                            <div class="small-7 cell">
                                                <label for="grossAnnualIncome" class="text-left middle">Gross Annual Income</label>
                                            </div>
                                            <div class="small-12 cell">
                                                <div class="input-group">
                                                    <span class="input-group-label">£</span>
                                                    <input class="input-group-field" id="grossAnnualIncome" name="grossAnnualIncome" type="number" required pattern="^[0-9]+$" min="1">
                                                    <span class="form-error">Please enter a valid income amount.</span>
                                                </div>
                                            </div>
                                            <div class="cell medium-12">
                                                <label>
                                                    Additional Information <i class="uil uil-comment-info right" data-tooltip tabindex="1" title="Please provide information about your current outstanding mortgage, and any additional loan if applicable."></i>
                                                    <textarea id="additionalInfo" name="additionalInfo" placeholder=" "></textarea>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-four form-step">
                                        <h2 class="margin-bottom-2">Summary</h2>
                                        <table class="unstriped summary-table">
                                            <tbody>
                                                <tr>
                                                    <td>Mortgage Type</td>
                                                    <td id="summaryMortgageType">Not selected</td>
                                                </tr>
                                                <tr>
                                                    <td>Reason for Loan</td>
                                                    <td id="summaryReason">Not selected</td>
                                                </tr>
                                                <tr>
                                                    <td>Property Price</td>
                                                    <td id="summaryPropertyPrice">£0</td>
                                                </tr>
                                                <tr>
                                                    <td>Loan Amount</td>
                                                    <td id="summaryLoanAmount">£0</td>
                                                </tr>
                                                <tr>
                                                    <td>Current Mortgage Outstanding</td>
                                                    <td id="summaryCurrentMortgageOutstanding">N/A</td>
                                                </tr>
                                                <tr>
                                                    <td>Additional Loan Amount</td>
                                                    <td id="summaryAdditionalLoanAmount">N/A</td>
                                                </tr>
                                                <tr>
                                                    <td>Mortgage Term</td>
                                                    <td id="summaryMortgageTerm">0 years</td>
                                                </tr>
                                                <tr>
                                                    <td>Additional Information</td>
                                                    <td id="summaryAdditionalInfo">-</td>
                                                </tr>
                                                <tr>
                                                    <td>Applicant Name</td>
                                                    <td id="summaryApplicantName">Not provided</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td id="summaryEmail">Not provided</td>
                                                </tr>
                                                <tr>
                                                    <td>Post Code</td>
                                                    <td id="summaryPostCode">-</td>
                                                </tr>
                                                <tr>
                                                    <td>City</td>
                                                    <td id="summaryCity">-</td>
                                                </tr>
                                                <tr>
                                                    <td>Country</td>
                                                    <td id="summaryCountry">United Kingdom</td>
                                                </tr>
                                                <tr>
                                                    <td>Employment Status</td>
                                                    <td id="summaryEmploymentStatus">Not selected</td>
                                                </tr>
                                                <tr>
                                                    <td>Gross Annual Income</td>
                                                    <td id="summaryGrossAnnualIncome">£0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="btn-group button-group expanded align-justify padding-vertical-2">
                                        <button type="button" class="button btn-prev" disabled>Back</button>
                                        <button type="button" class="button btn-next">Next</button>
                                        <button type="button" class="button success btn-submit" id="submitButton" style="display: none;">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="cell small-12 medium-12 text-center submission-success" style="display: none;">
                                <div class="bg-svg text-center"></div>
                                <h2>Form Sent</h2>
                                <p class="lead">Your input has been noted, someone from our team will reach out to you.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const root = document.querySelector('#form-box');
        const nextButton = root.querySelector('.btn-next');
        const prevButton = root.querySelector('.btn-prev');
        const submitButton = root.querySelector('#submitButton');
        const steps = root.querySelectorAll('.step');
        const formSteps = root.querySelectorAll('.form-step');
        const form = root.querySelector('#mortgageForm');
        const formProgress = root.querySelector('.form-progress');
        const formContent = root.querySelector('.form-content');
        const submissionSuccess = root.querySelector('.submission-success');
        let active = 1;
        const formData = {};

        // Initialize Foundation Abide
        const abide = new Foundation.Abide(jQuery(form));

        // Define option sets for #reason
        const standardReasonOptions = [{
                value: '',
                text: 'Please Select'
            },
            {
                value: 'first-time-buyer',
                text: 'First Time Buyer'
            },
            {
                value: 'new-build',
                text: 'New Build'
            },
            {
                value: 'standard-purchase',
                text: 'Standard Purchase'
            },
            {
                value: 'help-to-buy',
                text: 'Help to Buy'
            },
            {
                value: 'right-to-buy',
                text: 'Right to Buy'
            },
            {
                value: 'shared-ownership',
                text: 'Shared Ownership'
            },
            {
                value: 'home-mover',
                text: 'Home Mover'
            },
            {
                value: 'debt-consolidation',
                text: 'Debt Consolidation'
            }
        ];

        const remortgageReasonOptions = [{
                value: '',
                text: 'Please Select'
            },
            {
                value: 'standard-remortgage',
                text: 'Standard Remortgage'
            },
            {
                value: 'debt-consolidation',
                text: 'Debt Consolidation'
            },
            {
                value: 'home-improvement',
                text: 'Home Improvement'
            },
            {
                value: 'second-charge',
                text: 'Second Charge'
            }
        ];
        const specialistReasonOptions = [{
                value: '',
                text: 'Please Select'
            },
            {
                value: 'buy-to-let-purchase',
                text: 'Buy-to-Let Purchase'
            },
            {
                value: 'buy-to-let-remortgage',
                text: 'Buy-to-Let Remortgage'
            },
            {
                value: 'equity-release',
                text: 'Equity Release'
            },
            {
                value: 'bridging-loan',
                text: 'Bridging Loan'
            },
            {
                value: 'commercial-mortgage',
                text: 'Commercial Mortgage'
            },
            {
                value: 'secured-loan',
                text: 'Secured Loan'
            },
            {
                value: 'development-finance',
                text: 'Development Finance'
            }
        ];

        // Function to toggle additional fields based on radio selection
        const toggleAdditionalFields = () => {
            const selectedMortgage = form.querySelector('input[name="mortgageOption"]:checked');
            const mortgageType = selectedMortgage ? selectedMortgage.value : null;
            const showFields = mortgageType === 'remortgage' || mortgageType === 'specialist-lending';
            const currentMortgageGroup = form.querySelector('#currentMortgageOutstandingGroup');
            const additionalLoanGroup = form.querySelector('#additionalLoanAmountGroup');

            currentMortgageGroup.style.display = showFields ? 'flex' : 'none';
            additionalLoanGroup.style.display = showFields ? 'flex' : 'none';
        };

        // Function to update #reason options
        const updateReasonOptions = () => {
            const selectedMortgage = form.querySelector('input[name="mortgageOption"]:checked');
            const reasonSelect = form.querySelector('#reason');
            const currentValue = reasonSelect.value;
            const mortgageType = selectedMortgage ? selectedMortgage.value : null;
            const options = (mortgageType === 'specialist-lending') ? specialistReasonOptions :
                (mortgageType === 'remortgage') ? remortgageReasonOptions :
                standardReasonOptions;

            reasonSelect.innerHTML = '';
            options.forEach(option => {
                const opt = document.createElement('option');
                opt.value = option.value;
                opt.textContent = option.text;
                reasonSelect.appendChild(opt);
            });

            const validOption = options.find(opt => opt.value === currentValue);
            reasonSelect.value = validOption ? currentValue : '';

            reasonSelect.dispatchEvent(new Event('change', {
                bubbles: true
            }));
            jQuery(reasonSelect).trigger('validate.abide');
            if (reasonSelect.checkValidity() && reasonSelect.value !== '') {
                reasonSelect.classList.remove('is-invalid');
            }
            toggleAdditionalFields();
        };

        // Button click handlers
        root.querySelector('#purchase-btn') && (root.querySelector('#purchase-btn').onclick = function() {
            form.querySelector('input[name="mortgageOption"][value="purchase"]').checked = true;
            updateReasonOptions('purchase');
        });

        root.querySelector('#remortgage-btn') && (root.querySelector('#remortgage-btn').onclick = function() {
            form.querySelector('input[name="mortgageOption"][value="remortgage"]').checked = true;
            updateReasonOptions('remortgage');
        });

        root.querySelector('#specialist-lending-btn') && (root.querySelector('#specialist-lending-btn').onclick = function() {
            form.querySelector('input[name="mortgageOption"][value="specialist-lending"]').checked = true;
            updateReasonOptions('specialist-lending');
        });

        // Function to collect form data
        const collectFormData = () => {
            const mortgageType = form.querySelector('input[name="mortgageOption"]:checked');
            formData.mortgageType = mortgageType ? mortgageType.value : 'Not selected';
            formData.reason = form.querySelector('#reason').value || 'Not selected';
            formData.propertyPrice = form.querySelector('#propertyPrice').value || '0';
            formData.loanAmount = form.querySelector('#loanAmount').value || '0';
            formData.mortgageTerm = form.querySelector('#mortgageTerm').value || '0';
            formData.currentMortgageOutstanding = form.querySelector('#currentMortgageOutstanding').value || '0';
            formData.additionalLoanAmount = form.querySelector('#additionalLoanAmount').value || '0';
            formData.additionalInfo = form.querySelector('#additionalInfo').value || '';
            formData.firstName = form.querySelector('#firstName').value || '';
            formData.lastName = form.querySelector('#lastName').value || '';
            formData.phone = form.querySelector('#phone').value || '';
            formData.email = form.querySelector('#email').value || 'Not provided';
            formData.postCode = form.querySelector('#postCode').value || '';
            formData.city = form.querySelector('#city').value || '';
            formData.country = form.querySelector('#country').value || 'United Kingdom';
            formData.employmentStatus = form.querySelector('#employmentStatus').value || 'Not selected';
            formData.grossAnnualIncome = form.querySelector('#grossAnnualIncome').value || '0';
        };

        // Function to populate summary table
        const populateSummary = () => {
            if (active === 4) {
                form.querySelector('#summaryMortgageType').textContent = formData.mortgageType.replace('-', ' ').replace(/\b\w/g, l => l.toUpperCase());
                form.querySelector('#summaryReason').textContent = formData.reason.replace('-', ' ').replace(/\b\w/g, l => l.toUpperCase()) || 'Not selected';
                form.querySelector('#summaryPropertyPrice').textContent = `£${parseFloat(formData.propertyPrice).toLocaleString()}`;
                form.querySelector('#summaryLoanAmount').textContent = `£${parseFloat(formData.loanAmount).toLocaleString()}`;
                form.querySelector('#summaryMortgageTerm').textContent = `${formData.mortgageTerm} years`;
                form.querySelector('#summaryCurrentMortgageOutstanding').textContent =
                    (formData.mortgageType === 'remortgage' || formData.mortgageType === 'specialist-lending') ?
                    `£${parseFloat(formData.currentMortgageOutstanding).toLocaleString()}` : 'N/A';
                form.querySelector('#summaryAdditionalLoanAmount').textContent =
                    (formData.mortgageType === 'remortgage' || formData.mortgageType === 'specialist-lending') ?
                    `£${parseFloat(formData.additionalLoanAmount).toLocaleString()}` : 'N/A';
                form.querySelector('#summaryAdditionalInfo').textContent = formData.additionalInfo || '-';
                form.querySelector('#summaryApplicantName').textContent = `${formData.firstName} ${formData.lastName}`.trim() || 'Not provided';
                form.querySelector('#summaryEmail').textContent = formData.email;
                form.querySelector('#summaryPostCode').textContent = formData.postCode || '-';
                form.querySelector('#summaryCity').textContent = formData.city || '-';
                form.querySelector('#summaryCountry').textContent = formData.country || 'United Kingdom';
                form.querySelector('#summaryEmploymentStatus').textContent = formData.employmentStatus.replace('-', ' ').replace(/\b\w/g, l => l.toUpperCase());
                form.querySelector('#summaryGrossAnnualIncome').textContent = `£${parseFloat(formData.grossAnnualIncome).toLocaleString()}`;
            }
        };

        // Function to validate current step
        const validateStep = (stepIndex) => {
            const currentStep = formSteps[stepIndex];
            const inputs = currentStep.querySelectorAll('input, select');
            let isValid = true;

            inputs.forEach(input => {
                input.dispatchEvent(new Event('change', {
                    bubbles: true
                }));
                jQuery(input).trigger('validate.abide');

                if (input.closest('.additional-field') && input.closest('.additional-field').style.display === 'none') {
                    return;
                }

                if (!input.checkValidity()) {
                    isValid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            form.querySelector('[data-abide-error]').style.display = isValid ? 'none' : 'block';
            return isValid;
        };

        // Update progress and step visibility
        const updateProgress = () => {
            steps.forEach((step, i) => {
                if (i === active - 1) {
                    step.classList.add('active');
                    formSteps[i].classList.add('active');
                } else {
                    step.classList.remove('active');
                    formSteps[i].classList.remove('active');
                }
            });

            prevButton.disabled = active === 1;
            nextButton.style.display = active === steps.length ? 'none' : 'inline-block';
            submitButton.style.display = active === steps.length ? 'inline-block' : 'none';

            collectFormData();
            populateSummary();
        };

        // Next button click
        nextButton.addEventListener('click', (e) => {
            e.preventDefault();
            if (validateStep(active - 1)) {
                active++;
                if (active > steps.length) active = steps.length;
                updateProgress();
            }
        });

        // Previous button click
        prevButton.addEventListener('click', () => {
            active--;
            if (active < 1) active = 1;
            updateProgress();
        });

        // Submit button click
        submitButton.addEventListener('click', (e) => {
            e.preventDefault();
            let allValid = true;

            for (let i = 0; i < formSteps.length - 1; i++) {
                if (!validateStep(i)) {
                    allValid = false;
                    active = i + 1;
                    updateProgress();
                    break;
                }
            }

            if (allValid) {
                collectFormData();
                submitToGravityForms();
            }
        });

        // Real-time validation and data collection
        form.addEventListener('input', (e) => {
            const input = e.target;
            if (input.checkValidity()) {
                input.classList.remove('is-invalid');
            } else {
                input.classList.add('is-invalid');
            }
            collectFormData();
            populateSummary();
        });

        // Listen for radio changes
        form.querySelectorAll('input[name="mortgageOption"]').forEach(radio => {
            radio.addEventListener('change', () => {
                updateReasonOptions();
                collectFormData();
                populateSummary();
            });
        });

        // Listen for #reason changes
        form.querySelector('#reason').addEventListener('change', (e) => {
            const reasonSelect = e.target;
            collectFormData();
            populateSummary();
            jQuery(reasonSelect).trigger('validate.abide');
        });

        // Initial setup based on page
        const pageType = form.getAttribute('data-page');
        if (pageType === 'specialist-lending') {
            const specialistRadio = form.querySelector('#specialist-lending');
            specialistRadio.checked = true;
            specialistRadio.dispatchEvent(new Event('change', {
                bubbles: true
            }));
        }
        updateReasonOptions();
        updateProgress();

        // Submit to Gravity Forms via AJAX
        const submitToGravityForms = async () => {
            const ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
            const nonce = '<?php echo wp_create_nonce('submit_mortgage_gf_nonce'); ?>';
            const jsonString = JSON.stringify(formData);
            const payload = new URLSearchParams({
                action: 'submit_mortgage_to_gravity_forms',
                nonce: nonce,
                formData: jsonString,
            });

            try {
                const response = await fetch(ajaxUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: payload
                });

                if (response.ok) {
                    const result = await response.json();
                    window.dataLayer = window.dataLayer || [];
                    window.dataLayer.push({
                        'event': 'generate_lead',
                        'form_id': 'mortgageForm',
                        'service_type': formData.mortgageType || 'Not selected'
                    });
                    formProgress.style.display = 'none';
                    formContent.style.display = 'none';
                    submissionSuccess.style.display = 'block';
                } else {
                    alert('There was an error submitting the form: ' + response.statusText);
                }
            } catch (error) {
                alert('An error occurred while submitting the form.');
            }
        };
    });
</script>
