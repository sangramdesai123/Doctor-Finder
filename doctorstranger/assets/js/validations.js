/****************************Validations*************************/
$("#ds-login").bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            user_number: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The phone number is required and cannot be empty'
                    },
                    stringLength: {
                        min: 10,
                        max: 15,
                        message: 'Enter a valid phone number'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The phone number can only consist of number'
                    }
                }
            },
//            email: {
//                validators: {
//                    notEmpty: {
//                        message: 'The email address is required and cannot be empty'
//                    },
//                    emailAddress: {
//                        message: 'The email address is not a valid'
//                    }
//                }
//            },
            user_password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The password must have at least 8 characters'
                    }
                }
            },
//            birthday: {
//                validators: {
//                    notEmpty: {
//                        message: 'The date of birth is required'
//                    },
//                    date: {
//                        format: 'YYYY/MM/DD',
//                        message: 'The date of birth is not valid'
//                    }
//                }
//            },
//            gender: {
//                validators: {
//                    notEmpty: {
//                        message: 'The gender is required'
//                    }
//                }
//            }
        }
    });