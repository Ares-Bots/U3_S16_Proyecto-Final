
(function() {
    'use strict';

    var form = document.querySelector('.needs-validation');
    var errorMessage = document.getElementById('error-message');
    var inputs = form.querySelectorAll('.form-control');

    // Add event listeners to input fields to remove the error class when typing
    inputs.forEach(function(input) {
        input.addEventListener('input', function() {
            if (!input.validity.valid) {
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }
        });
    });

    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();

            inputs.forEach(function(input) {
                if (!input.validity.valid) {
                    input.classList.add('is-invalid');
                }
            });
    
            if (form.checkValidity()) {
                errorMessage.style.display = 'none';
                form.classList.add('was-validated');
            } else {
                errorMessage.style.display = 'block';
    
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 3000);
            }

        }

        form.classList.add('was-validated');
    }, false);
}) ();
