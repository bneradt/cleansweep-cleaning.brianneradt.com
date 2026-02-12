/**
 * Contact Form Handler
 * Intercepts Gravity Forms submission and sends to our PHP backend.
 *
 * This script runs at the end of <body> so the DOM is already available.
 * It listens on the submit button's click event because WP Rocket's
 * RocketLazyLoadScripts captures and replays click events, ensuring
 * our handler fires even on the user's first interaction.
 */

(function() {
    var form = document.querySelector('.gform_wrapper form');
    if (!form) {
        return;
    }

    var submitButton = form.querySelector('input[type="submit"]');
    if (!submitButton) {
        return;
    }

    function handleFormSubmission() {
        // Get form values from Gravity Forms fields.
        // Field mapping: input_1=name, input_3=email, input_4=phone,
        //                input_5=service (select), input_6=message (textarea)
        var nameField = document.querySelector('input[name="input_1"]');
        var emailField = document.querySelector('input[name="input_3"]');
        var phoneField = document.querySelector('input[name="input_4"]');
        var serviceField = document.querySelector('select[name="input_5"]');
        var messageField = document.querySelector('textarea[name="input_6"]');

        if (!nameField || !emailField || !phoneField) {
            alert('Please fill out all required fields');
            return;
        }

        if (!nameField.value.trim() || !emailField.value.trim() || !phoneField.value.trim()) {
            alert('Please fill out all required fields');
            return;
        }

        // Build form data
        var formData = new FormData();
        formData.append('name', nameField.value);
        formData.append('email', emailField.value);
        formData.append('phone', phoneField.value);
        formData.append('service', serviceField ? serviceField.value : '');
        formData.append('message', messageField ? messageField.value : '');

        // Show loading state
        var originalText = submitButton.value;
        submitButton.value = 'Sending...';
        submitButton.disabled = true;

        // Send to our PHP backend
        fetch('/api/send-email.php', {
            method: 'POST',
            body: formData
        })
        .then(function(response) { return response.json(); })
        .then(function(data) {
            if (data.success) {
                alert(data.message);
                form.reset();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(function() {
            alert('There was an error sending your message. Please call us directly at (217) 714-7408.');
        })
        .finally(function() {
            submitButton.value = originalText;
            submitButton.disabled = false;
        });
    }

    // Listen on click (WP Rocket saves and replays click events).
    submitButton.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        handleFormSubmission();
    });

    // Also listen on submit as a fallback.
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();
        handleFormSubmission();
    }, true);
})();
