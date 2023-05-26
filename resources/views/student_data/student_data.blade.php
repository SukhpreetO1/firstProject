<!DOCTYPE html>
<html>

<head>
    <title>Datatable</title>
    {{-- <meta name="token" content="{{ csrf_token() }}"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

{{-- to show the data in the form of table --}}
<script type="text/javascript">
    $(function() {
        var table = $('#yajra_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('students.list') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'first_name', name: 'first_name' },
                { data: 'last_name', name: 'last_name' },
                { data: 'email', name: 'email' },
                { data: 'userName', name: 'userName' },
                { data: 'phone_number', name: 'phone_number' },
                { data: 'dob', name: 'dob' },
                { data: 'action', name: 'action', orderable: true, searchable: true },
            ]
        });

    });
</script>

{{-- to delete the data --}}
<script>
    $('#yajra_datatable').on('click', '#delete', function() {
        var id = $(this).data('id');
        var deleteConfirm = confirm("Are you sure?");
        if (deleteConfirm == true) {
            // AJAX request
            $.ajax({
                url: "{{ route('deleteStudent') }}",
                type: 'post',
                data: { "_token": "{{ csrf_token() }}", "id": id },
                
                success: function(response) {
                    if (response.success == 1) {
                        alert("Record deleted.");

                        // Reload DataTable
                        location.replace("/students")
                    } else {
                        alert("Invalid ID.");
                    }
                }
            });
        }
    });
</script>

</html>