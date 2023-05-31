<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('asset/css/pagination.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css">
</head>

<body>

    @include('theme.header')

    @if (auth()->user()->role_id == 1)
        @include('theme.admin_sidebar')
    @else
        {
        @include('theme.sidebar')
        }
    @endif

    <div style="margin-left: 21%">
        @yield('content')
    </div>

    @include('theme.footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/fontawesome.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                $('#preview').attr('src', ''); // Clear the preview image src
            });
        });
    </script>
</body>

</html>
