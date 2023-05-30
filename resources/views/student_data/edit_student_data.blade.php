@extends('student_data.student.data')

@section('content')
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
                            <input type="text" class="form-control" id="userName" placeholder="Enter Username" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Phone Number</label>
                            <input type="number" class="form-control" id="phone_number" placeholder="Enter Phone number"
                                required maxlength="10">
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
@endsection
