
$(document).ready(function () {
    //customized methods
    jQuery.validator.addMethod("validEmail", function (value, element) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) {
            return true;
        } else {
            return false;
        };
    }, "Enter a valid email address!");

    jQuery.validator.addMethod("validDate", function (value, element) {
        var yearfield=value.split("-")[0];
        var monthfield=value.split("-")[1];
        var dayfield=value.split("-")[2];
        var dayobj = new Date(yearfield, monthfield-1, dayfield);
        var isValid=(dayobj.getMonth()+1==monthfield)&&(dayobj.getDate()==dayfield)&&(dayobj.getFullYear()==yearfield); //||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield)) !==null);
        if(isValid){
            return true;
        }
        else{
            return false;
        };
    }, "Invalid date format!");

    jQuery.validator.addMethod("phoneUS", function (phone_number, element) {
        phone_number = phone_number.replace(/\s+/g, "");
        return this.optional(element) || phone_number.length > 9 &&
                phone_number.match(/^\+[0-9]{12}$/);
    }, "Specify a valid phone number!");

    //SECTION A: Applicant's Personal Details.
    $("#register").validate({
        rules:{
            fname:{
                required:true,
                lettersonly:true
            },

            mname:{
                lettersonly:true
            },

            lname:{
                required:true,
                lettersonly:true
            },

            gender:{
                required:true
            },

            dob:{
                required:true,
                validDate:true
            },

            address:{
                required:true
            },

            mobile:{
                required:true,
                //digits:true,
                //rangelength:[10,10],
                phoneUS:true
            },

            country:{
                required:true
            }
        },

        messages:{
            fname:{
                required: "Enter your first name!",
                lettersonly: "Name should contains letters only!"
            },

            lname:{
                required: "Enter your last name!",
                lettersonly: "Name should contains letters only!"
            },
            mname: "Name should contains letters only!",
            gender: "Select your gender!",
            dob: {
                required:"Enter your date of birth!",
                validDate:"Invalid date format!"
            },
            address: "Enter your address!",
            mobile:{
                required: "Enter your phone number!",
                //digits: "Phone number contains digits only!",
                //rangelength: "Phone number is only 10 digits"
            },
            country: "Select country!"
        }
    });

    //SECTION B: Applicant's Education Background.
    $("#myForm2").validate({
        rules:{
            eng:{
                required:true
            },

            kisw:{
                required:true
            },

            maths:{
                required:true
            },

            physics:{
                required:true
            },

            grp2:{
                required:true
            },

            grp3:{
                required:true
            },

            grp4or5:{
                required:true
            },

            aggregatePoints:{
                required:true,
                digits:true,
                min:20,
                max:84
            }
        },

        messages:{
            eng: "Choose your english grade!",
            kisw: "Choose your kiswahili grade!",
            maths: "Choose your maths grade!",
            physics: "Choose your physics grade!",
            grp2: "Choose grade!",
            grp3: "Choose grade!",
            grp4or5: "Choose grade!",
            aggregatePoints:{
                required:"Enter your aggregate points!",
                digits: "Aggregate points should be a whole number!",
                min: "Check your points, too low!",
                max: "Aggregate points cannot exceed 84"
            }
        }
    });

    //SECTION C: Course Application Details.
    $("#myForm3").validate({
        rules:{
            programmeLevel:{
                required:true
            },

            programmeName:{
                required:true
            },

            modeOfStudy:{
                required:true
            },

            campus:{
                required:true
            }
        },

        messages:{
            programmeLevel:"Select the programme level!",
            programmeName: "Select the programme name!",
            modeOfStudy:"Select mode of study!",
            campus:"Select campus!"
        }
    });

    //Registration Form
    $("#myForm4").validate({
        rules:{
           reg:{
                required:true
            },

            mname:{
                lettersonly:true
            },


            password1:{
                required:true
            },

            password2:{
                required:true,
                equalTo:"#password1"
            },

            oldPwd:{
                required:true
            }
        },

        messages:{
            reg:{
                required: "Enter your Registration Number!",
            },

            lname:{
                required: "Enter your last name!",
                lettersonly: "Name should contains letters only!"
            },
            mname: "Name should contains letters only!",

            email:{
                required:"Enter your email address!",
                email:"Enter a valid email address!"
            },
            password1:"Enter your password!",
            password2:{
                required:"Confirm your password!",
                equalTo:"Passwords should match!"
            },
            oldPwd: "Enter your current password!"
        }
    });

    //Ranking Form
    $("#myForm5").validate({
        rules:{
            cs:{
                required:true
            },

            it:{
                required:true
            },

            info:{
                required:true
            },

            cf:{
                required:true
            }
        },

        messages:{
            cs:{
                required: "Specify Required Number of Applicants!"
            },

            it:{
                required: "Specify Required Number of Applicants!"
            },

            info:{
                required: "Specify Required Number of Applicants!"
            },

            cf:{
                required: "Specify Required Number of Applicants!"
            }
        }
    });
    //Login form
    $("#myForm6").validate({
        rules:{
            email:{
                required:true
            },

            password:{
                required:true
            },
            email2:{
                required: true,
                email:true,
                validEmail:true
            }
        },

        messages:{
            email: "Username cannot be blank!",
            password: "Password cannot be blank!",
            email2:{
                required:"Enter your email address!",
                email:"Enter a valid email address!"
            }
        }
    });
    //email for reset pwd
    $("#myForm7").validate({
        rules:{
            password1:{
                required: true
            },
            password2:{
                required:true,
                equalTo:"#password1"
            },
            email:{
                required: true,
                email:true,
                validEmail:true
            }
        },

        messages:{
            email:{
                required:"Enter your email address!",
                email:"Enter a valid email address!"
            },
            password1: "New password required!",
            password2:{
                required: "Confirm new password required!",
                equalTo:"Passwords should match!"
            }
        }
    });

});