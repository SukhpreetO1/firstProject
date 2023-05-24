@extends('theme.layout')

@section('content')
    @if (session('user_success_message'))
        <div class="alert alert-success">{{ session('user_success_message') }}</div>
    @endif

    {{-- show login error authentication alert --}}
    {{-- @if (session('error_authentication'))
        <div class="alert alert-danger">{{ session('error_authentication') }}</div>
    @endif --}}

    {{-- @if ('error_authentication' == true)
        <div class="alert alert-danger">{{ session('error_authentication') }}</div>      
    @endif --}}

    <section class="user_middlecontent">
        <div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, quia necessitatibus doloribus, atque at tempore
            obcaecati temporibus voluptas quo provident eum aliquam neque error dolores, aliquid perspiciatis quis harum.
            Excepturi deserunt, hic, dicta minima tenetur aspernatur fuga temporibus non dolorem optio aut doloremque
            expedita esse explicabo illum. Eaque, iure doloremque.
        </div>
    </section>
@endsection
