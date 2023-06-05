@extends('theme.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb mt-3 mb-2 d-flex">
                <div class="pull-left" style="margin-left: 37%;">
                    <h1> View Blogs</h1>
                </div>
                <div class="pull-right" style="position: absolute; right: 3%; top: 5%; ">
                    <a class="btn btn-primary" href="{{ route('blog.index') }}"> Back</a>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="show_heading">
                <h2><strong> Title : </strong><span>{{ $blogs->title }}</span> </h2>
            </div>

            <div class="view_body">
                <h4><strong>Description : </strong></h4>
                <p class="lead">
                    <?php echo $blogs->description; ?>
                </p>
            </div>

            <div class="show_timing">
                <span>Submitted in {{ date('F j, Y, g:i a', strtotime($blogs->created_at)) }}</span>
            </div>

        </div>
    </div>
@endsection
