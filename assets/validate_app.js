$(function(){
		    $('#candidate_personal_info_form').validate({
        rules: {
            title: {
                minlength: 3,
                maxlength: 15,
                required: true
            },
            lastname: {
                minlength: 3,
                maxlength: 15,
                required: true
            },
            user_file: {
                required: true,
                extension: "pdf"
            }
        },
        messages: {
            title: {
                required: "Please upload resume"
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
});