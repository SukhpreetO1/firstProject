<script type="text/javascript">
    $(document).ready(function() {
        $("#registration").validate({
            rules: {
                first_name: {
                    required: true,
                    maxlength: 20,
                },
                last_name: {
                    required: true,
                    maxlength: 20,
                },
                userName: {
                    required: true,
                    maxlength: 20,
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50,
                },
                phone_number: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
                gender: {
                    required: true,
                }
            },
            messages: {
                first_name: {
                    required: "First name is required",
                    maxlength: "First name cannot be more than 20 characters"
                },
                last_name: {
                    required: "Last name is required",
                    maxlength: "Last name cannot be more than 20 characters"
                },
                email: {
                    required: "Email is required",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 50 characters",
                },
                userName: {
                    required: "Username is required",
                    maxlength: "Username cannot be more than 20 characters"
                },
                phone_number: {
                    required: "Phone number is required",
                    minlength: "Phone number must be of 10 digits"
                },
                password: {
                    required: "Password is required",
                    minlength: "Password must be at least 6 characters"
                },
                confirm_password: {
                    required: "Confirm password is required",
                    equalTo: "Password not matched",
                },
                gender: {
                    required: "Please select the gender",
                }
            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("input").on("blur", function() {
            if (this.value == "") {
                // if input is empty
                $(this).css("border-color", "red");
                $(this).css("border-width", "revert");
            } else {
                $(this).css("border-color", "green");
                $(this).css("border-width", "revert");
                // if (error == false) {
                //     console.log("asfsfsf");
                //     $(this).css("border-color", "green");
                //     $(this).css("border-width", "revert");
                // } else {
                //     $(this).css("border-color", "red");
                //     $(this).css("border-width", "revert");
                // }
            }
        }).trigger("change")

        $("select").on("blur", function() {
            if (this.value == "") {
                // if select is empty
                $(this).css("border-color", "red");
                $(this).css("border-width", "2px");
            } else {
                $(this).css("border-color", "green");
                $(this).css("border-width", "2px");
            }
        }).trigger("change")
    });
</script>
