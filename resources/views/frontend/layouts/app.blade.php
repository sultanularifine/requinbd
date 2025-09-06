<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Glevo Tech – IT Services for Startups & SMBs')</title>
    <meta name="description" content="@yield('meta_description', 'We deliver outsourced IT services for startups & mid-sized businesses.')">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">

    <!-- Styles -->
    @stack('styles')
</head>
<body>
    {{-- Header --}}
    @include('frontend.layouts.header')

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('frontend.layouts.footer')

    <!-- Scripts -->
    <script>
        const btn = document.querySelector('.menu-toggle');
        const menu = document.getElementById('menu');
        btn.addEventListener('click', () => menu.classList.toggle('open'));
        menu.querySelectorAll('a').forEach(a =>
            a.addEventListener('click', () => menu.classList.remove('open'))
        );
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
  

    @stack('scripts')
</body>
</html>
