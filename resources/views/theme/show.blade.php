@extends('theme.layout')

@section('content')
    <main class="user-detials">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3 class="card-header text-center">Details</h3>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="col-md-8">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <img src="/profile_pic/{{ Auth::user()->profile_pic }}" id="preview"
                                            alt="Profile image" style="max-width: 100%;margin-left: 117%;;border-radius: 50%;">

                                        @error('profile_pic')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <input id="profile_pic" type="file" accept="image/*"
                                            class="form-control @error('profile_pic') is-invalid @enderror"
                                            name="profile_pic" value="{{ old('profile_pic') }}" required
                                            style=" margin-left: 76%; margin-top: 13%; width: 170%;">
                                    </div>

                                    <div class="cross_button">
                                        <button type="button" class="btn-close" aria-label="Close" id="removeImage"
                                            style="position: absolute; right: -10px; top: 4px; block-size: 2%; "></button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex">
                                <div class="form-group mb-3 me-4">
                                    <input type="text" placeholder="First Name" id="first_name" class="form-control"
                                        name="first_name" autofocus value={{ Auth::user()->first_name }} autocomplete='off'>
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif

                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Last Name" id="last_name" class="form-control"
                                        name="last_name" autofocus value={{ Auth::user()->last_name }} autocomplete='off'>
                                    @if ($errors->has('last_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group d-flex">
                                <div class="form-group mb-3 me-4">
                                    <input type="email" placeholder="Email" id="email" class="form-control"
                                        name="email" autofocus value={{ Auth::user()->email }} autocomplete='off'>
                                    @if ($errors->has('email'))
                                        <span class enctype="multipart/form-data">
                                            @csrf="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Username" id="userName" class="form-control"
                                        name="userName" autofocus value={{ Auth::user()->userName }} autocomplete='off'>
                                    @if ($errors->has('userName'))
                                        <span class="text-danger">{{ $errors->first('userName') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group d-flex">
                                <div class="form-group mb-3 me-4" name="gender" id="gender">
                                    <select class="form-select" aria-label="Default select example" style="width:13.5rem"
                                        name="gender" id="gender">
                                        <option selected>Gender</option>
                                        <option value="Male" <?php if (Auth::user()->gender == 'Male') {
                                            echo 'selected';
                                        } ?>>Male</option>
                                        <option value="Female" <?php if (Auth::user()->gender == 'Female') {
                                            echo 'selected';
                                        } ?>>Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Phone Number" id="phone_number" class="form-control"
                                        name="phone_number" autofocus maxlength="10"
                                        value={{ Auth::user()->phone_number }}>

                                    @if ($errors->has('phone_number'))
                                        <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">{{ __('Upload Profile') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Handle file input change event
            $('#profile_pic').on('change', function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();

                // Load image content to the FileReader
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }

                // Read the file content
                reader.readAsDataURL(file);
            });
            $('#removeImage').on('click', function(e) {
                $('#profile_pic').val(''); // Clear the file input value
                $('#preview').attr('src', 'https://t3.ftcdn.net/jpg/02/09/37/00/360_F_209370065_JLXhrc5inEmGl52SyvSPeVB23hB6IjrR.jpg'); // Clear the preview image src
            });
        });
    </script>
@endsection
