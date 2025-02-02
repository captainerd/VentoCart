<div class="container-fluid cookie-gdpr-notice fixed-bottom bg-dark text-white py-3" style="z-index: 9999;">
    <div class="d-flex flex-wrap justify-content-center align-items-center" style="max-width: 800px; margin: 0 auto;">
        <!-- Notice Text -->
        <div class="text-center mb-2 mb-sm-0">
            <p><?= $text_notice ?></p>
        </div>

        <!-- Cookie Options (checkboxes) -->
        <div class="d-flex flex-wrap justify-content-center align-items-center mb-2 mb-sm-0">
            <div class="form-check me-3">
                <!-- Essential Cookies Checkbox (cannot be unchecked) -->
                <input type="checkbox" class="form-check-input" id="essential-cookies" checked disabled>
                <label class="form-check-label" for="essential-cookies"><?= $text_essential_cookies ?></label>
            </div>
            <div class="form-check">
                <!-- Tracking Cookies Checkbox (can be unchecked or not, based on force_accept) -->
                <input type="checkbox" class="form-check-input" id="tracking-cookies" <?= $force_accept ? 'checked disabled' : 'checked' ?>>
                <label class="form-check-label" for="tracking-cookies"><?= $text_tracking_cookies ?></label>
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex mx-3 justify-content-center align-items-center">
            <button id="accept-btn" class="btn btn-success me-2"><?= $button_accept ?></button>
            <button id="decline-btn" class="btn btn-dark"><?= $button_deny ?></button>
        </div>
    </div>
</div>

<script>
    document.getElementById('accept-btn').addEventListener('click', function () {
        var isTrackingChecked = document.getElementById('tracking-cookies').checked;

        if (isTrackingChecked) {
            document.cookie = "accept-tracking=true; path=/; expires=" + new Date(Date.now() + 365 * 24 * 60 * 60 * 1000).toUTCString();
        }

        document.querySelector('.cookie-gdpr-notice').style.display = 'none';
    });

    document.getElementById('decline-btn').addEventListener('click', function () {
        // If force_accept is true, just redirect to blank page without setting any cookies
        <?php if ($force_accept) { ?>
            window.location.href = 'https://commission.europa.eu/cookies-policy_en';
        <?php } else { ?>
            document.cookie = "deny-tracking=true; path=/; expires=" + new Date(Date.now() + 5 * 60 * 60 * 1000).toUTCString();

            document.querySelector('.cookie-gdpr-notice').style.display = 'none';
        <?php } ?>
    });
</script>