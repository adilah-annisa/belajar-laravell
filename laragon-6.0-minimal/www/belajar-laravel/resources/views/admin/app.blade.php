{{-- resources/views/admin/app.blade.php --}}
@include('admin.layouts.css')
@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<main class="content">
    @yield('content')
</main>

@include('admin.layouts.footer')
@include('admin.layouts.js')
