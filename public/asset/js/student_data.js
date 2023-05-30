    // to show the data in the form of table

    $(function() {
        var table = $("#yajra_datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('students.list') }}",
            columns: [{
                    data: "id",
                    name: "id"
                },
                {
                    data: "first_name",
                    name: "first_name"
                },
                {
                    data: "last_name",
                    name: "last_name"
                },
                {
                    data: "email",
                    name: "email"
                },
                {
                    data: "userName",
                    name: "userName"
                },
                {
                    data: "phone_number",
                    name: "phone_number"
                },
                {
                    data: "dob",
                    name: "dob"
                },
                {
                    data: "action",
                    name: "action",
                    orderable: true,
                    searchable: true,
                },
            ],
        });
    });



    // to delete the data
    $("#yajra_datatable").on("click", "#delete", function() {
        var id = $(this).data("id");
        var deleteConfirm = confirm("Are you sure?");
        if (deleteConfirm == true) {
            // AJAX request
            $.ajax({
                url: "{{ route('deleteStudent') }}",
                type: "post",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },

                success: function(response) {
                    if (response.success == 1) {
                        alert("Record deleted.");

                        // Reload DataTable
                        location.replace("/students");
                    } else {
                        alert("Invalid ID.");
                    }
                },
            });
        }
    });



    // Update record
    $("#yajra_datatable").on("click", "#updateStudent", function() {
        var id = $(this).data("id");

        $("#update_id").val(id);

        // AJAX request
        $.ajax({
            url: "{{ route('updateStudent') }}",
            type: "post",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.success == 1) {
                    $("#first_name").val(response.first_name);
                    $("#last_name").val(response.last_name);
                    $("#email").val(response.email);
                    $("#userName").val(response.userName);
                    $("#phone_number").val(response.phone_number);
                    $("#dob").val(response.dob);

                    alert("Record update successfully.");

                    // Reload DataTable
                    location.replace("/students");

                } else {
                    alert("Invalid ID.");
                }
            },
        });
    });



    // Save user
    $("#btn_save").click(function() {
        var id = $("#txt_empid").val();

        var first_name = $("#first_name").val().trim();
        var last_name = $("#last_name").val().trim();
        var email = $("#email").val().trim();
        var userName = $("#userName").val().trim();
        var phone_number = $("#phone_number").val().trim();
        var dob = $("#dob").val().trim();

        if (emp_name != "" && email != "" && city != "") {
            // AJAX request
            $.ajax({
                url: "{{ route('updateStudent') }}",
                type: "post",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    userName: userName,
                    phone_number: phone_number,
                    dob: dob,
                },
                dataType: "json",
                success: function(response) {
                    if (response.success == 1) {
                        alert(response.msg);

                        // Empty and reset the values
                        $("#first_name", "last_name", "#email", "#userName", "phone_number", "#dob")
                            .val("");
                        $("#txt_empid").val(0);

                        // Reload DataTable
                        yajra_datatable.ajax.reload();

                        // Close modal
                        $("#updateStudent").modal("toggle");
                    } else {
                        alert(response.msg);
                    }
                },
            });
        } else {
            alert("Please fill all fields.");
        }
    });