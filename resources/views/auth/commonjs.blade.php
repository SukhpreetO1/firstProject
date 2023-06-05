{{-- @section('scripts') --}}
    <script type="text/javascript">
        function matchpass() {
            var firstpassword = document.registration.password.value;
            var secondpassword = document.registration.confirm_password.value;

            if (firstpassword == secondpassword) {
                return true;
            } else {
                alert("Password must be same!");
                return false;
            }
        }
    </script>
{{-- @endsection --}}
