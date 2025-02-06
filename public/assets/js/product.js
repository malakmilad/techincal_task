$(document).ready(function () {
    $('#product_form').submit(function (e) {
        e.preventDefault();
        let url = $(this).attr("action");
        let formData = new FormData(this);

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status === "success") {
                    window.location.href = response.redirect; // Redirect to index page
                }
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                $(".alert-danger").remove(); // Remove previous errors

                if (errors) {
                    $.each(errors, function (key, value) {
                        let inputField = $('[name="' + key + '"]');
                        let errorHtml =
                            '<div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">' +
                            '<i class="bi bi-exclamation-octagon me-1"></i>' +
                            value +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                            '</div>';

                        inputField.after(errorHtml);
                    });
                }
            }
        });
    });
});
