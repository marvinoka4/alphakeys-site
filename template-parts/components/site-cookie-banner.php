<?php

/**
 * Template Part: Site Cookie Banner
 */
?>
<!-- Cookie Banner -->
<div id="cookie-banner" style="display: none; position: fixed; bottom: 0; left: 0; right: 0; background: #f3f3f9; color: #02066F; padding: 15px; z-index: 1000; font-family: Munika-Medium, sans-serif; text-align: center; border-top: 1px solid #02066F;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <p style="margin: 0 0 10px 0; font-size: 14px;">
            We use cookies to improve your experience and analyse site usage. See our <a href="/cookie-policy" style="color: #333333; text-decoration: underline;">Cookie Policy</a> and <a href="/privacy-policy" style="color: #333333; text-decoration: underline;">Privacy Policy</a>.
        </p>
        <button id="accept-cookies" style="background: #02066F; color: #ffffff; border: none; padding: 8px 20px; margin: 0 10px; cursor: pointer;">Accept</button>
        <button id="decline-cookies" style="background: transparent; color: #02066F; border: 1px solid #02066F; padding: 8px 20px; cursor: pointer;">Decline</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const banner = document.getElementById('cookie-banner');
        const acceptBtn = document.getElementById('accept-cookies');
        const declineBtn = document.getElementById('decline-cookies');

        window.dataLayer = window.dataLayer || [];

        // Show banner if no consent
        if (!localStorage.getItem('cookieConsent')) {
            banner.style.display = 'block';
        }

        // Accept button
        acceptBtn.addEventListener('click', function() {
            window.dataLayer.push({
                'event': 'consent_update',
                'consent': {
                    'ad_storage': 'granted',
                    'analytics_storage': 'granted',
                    'ad_user_data': 'granted',
                    'ad_personalization': 'granted',
                    'functionality_storage': 'granted',
                    'personalization_storage': 'granted',
                    'security_storage': 'granted'
                }
            });
            localStorage.setItem('cookieConsent', 'accepted');
            banner.style.display = 'none';
        });

        // Decline button
        declineBtn.addEventListener('click', function() {
            window.dataLayer.push({
                'event': 'consent_update',
                'consent': {
                    'ad_storage': 'denied',
                    'analytics_storage': 'denied',
                    'ad_user_data': 'denied',
                    'ad_personalization': 'denied',
                    'functionality_storage': 'granted',
                    'personalization_storage': 'denied',
                    'security_storage': 'granted'
                }
            });
            localStorage.setItem('cookieConsent', 'declined');
            banner.style.display = 'none';
        });

        // Apply stored consent on load
        const consent = localStorage.getItem('cookieConsent');
        if (consent) {
            window.dataLayer.push({
                'event': 'consent_update',
                'consent': consent === 'accepted' ? {
                    'ad_storage': 'granted',
                    'analytics_storage': 'granted',
                    'ad_user_data': 'granted',
                    'ad_personalization': 'granted',
                    'functionality_storage': 'granted',
                    'personalization_storage': 'granted',
                    'security_storage': 'granted'
                } : {
                    'ad_storage': 'denied',
                    'analytics_storage': 'denied',
                    'ad_user_data': 'denied',
                    'ad_personalization': 'denied',
                    'functionality_storage': 'granted',
                    'personalization_storage': 'denied',
                    'security_storage': 'granted'
                }
            });
        }
    });
</script>