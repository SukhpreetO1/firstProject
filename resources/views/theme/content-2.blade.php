@extends('theme.layout')

@section('content')
    @if (session('success_message'))
        <div class="alert alert-success">{{ session('success_message') }}</div>
    @endif

    <section class="admin_middlesection">
        <div>
            This is admin page.
        </div>
    </section>
@endsection
