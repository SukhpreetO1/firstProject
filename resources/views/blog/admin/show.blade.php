@extends('theme.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb mt-3 mb-2 d-flex">
                <div class="pull-left" style="margin-left: 37%;">
                    <h1> View Users Blogs</h1>
                </div>
                <div class="pull-right" style="position: absolute; right: 3%; top: 5%; ">
                    <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="content">
            @foreach ($admin_panel as $admin_panel_blog)
                    <div class="users_details" style="display: flex; font-size: 1.5rem;">
                        <div class="users_personal_details" style="margin-right: 24%; margin-left: 14%;">
                            <p><strong>First Name : </strong> {{ $admin_panel_blog->first_name }}</p>
                            <p><strong>Last Name : </strong>{{ $admin_panel_blog->last_name }}</p>
                        </div>

                        <div class="users_personals-details">
                            <p><strong>Username : </strong>{{ $admin_panel_blog->userName }}</p>
                            <p><strong>Email : </strong>{{ $admin_panel_blog->email }}</p>
                        </div>
                    </div>
                    <div style="display: grid; ">
                        @foreach ($admin_panel_blog->blog as $admin_panel_blogs)
                            <button class="accordion btn-outline-primary"
                                style="border-radius: 6%; margin-bottom: 1%; width: 17%; "> Title :
                                {{ $admin_panel_blogs->title }}</button>
                            <div class="panel" style="display: none;">
                                <p><?php echo $admin_panel_blogs->description; ?></p>
                            </div>
                        @endforeach
                        </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                console.log("click");
                this.classList.toggle("active");

                var panel = this.nextElementSibling;
                if (panel.style.display === "none") {
                    panel.style.display = "block";
                } else {
                    panel.style.display = "none";
                }
            });
        }
    </script>
@endsection
