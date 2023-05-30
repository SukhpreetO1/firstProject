<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="token" content="{{ csrf_token() }}"> --}}
    <title>Datatable</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
</head>

<body>

    <div class='container mt-5'>
        <!-- Modal -->
        <div id="updateStudent" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" id="first_name" placeholder="Enter first name"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Enter last name"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" id="userName" placeholder="Enter Username"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="name">Phone Number</label>
                            <input type="number" class="form-control" id="phone_number"
                                placeholder="Enter Phone number" required maxlength="10">
                        </div>

                        <div class="form-group">
                            <label for="name">Date of birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" id="update_id" value="0">
                        <button type="button" class="btn btn-success btn-sm" id="btn_save">Save</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <h2 class="mb-4">Yajra Datatables</h2>
        <table class="table table-bordered yajra-datatable" id="yajra_datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Phone Number</th>
                    <th>DOB</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>


</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

{{-- <script type="text/javascript" src="{{ asset('asset/js/student_data.js')}}"></script> --}}

<script type="text/javascript">
    // to show the data in the form of table
    $(document).ready(function() {
        // $(function() {
        var table = $("#yajra_datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('students.list') }}",
            columns: [{ data: "id" },
                { data: "first_name" },
                { data: "last_name" },
                { data: "email" },
                { data: "userName" },
                { data: "phone_number" },
                { data: "dob" },
                { data: "action", orderable: true, searchable: true, },
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
            url: "{{ route('getStudentData') }}",
            type: "get",
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
        var id = $("#update_id").val();
        console.log(id);
        var first_name = $("#first_name").val().trim();
        var last_name = $("#last_name").val().trim();
        var email = $("#email").val().trim();
        var userName = $("#userName").val().trim();
        var phone_number = $("#phone_number").val().trim();
        var dob = $("#dob").val().trim();

        if (first_name != "" && email != "" && userName != "") {
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
                        $("#update_id").val(0);

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
</script>

</html>
