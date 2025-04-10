<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KiosArtikelZ</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/icon.png">

    <!-- Icons & Plugins -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.3.0/ckeditor5.css" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        @include('layouts.front.nav')

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        @include('layouts.front.footer')
    </div>

    <!-- jQuery & Select2 -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>

    <!-- Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/44.3.0/ckeditor5.umd.js"></script>

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        // Inisialisasi TinyMCE untuk ID deskripsi
        tinymce.init({
            selector: '#deskripsi',
            plugins: 'lists link image preview code',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | link image | preview code',
            height: 300,
        });

        // Inisialisasi TinyMCE untuk ID editor
        tinymce.init({
            selector: '#editor',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen preview save print | insertfile image media link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_retention: '2m',
            image_advtab: true,
            height: 600,
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>

    <!-- Toggle Dropdown and Mobile Navbar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userMenu = document.getElementById('user-menu');
            const dropdownMenu = document.getElementById('dropdown-menu');
            const navbarToggle = document.getElementById('navbar-toggle');
            const navbarItems = document.querySelector('.md\\:flex');

            if (userMenu && dropdownMenu) {
                userMenu.addEventListener('click', function() {
                    dropdownMenu.classList.toggle('hidden');
                });
            }

            if (navbarToggle && navbarItems) {
                navbarToggle.addEventListener('click', function() {
                    navbarItems.classList.toggle('hidden');
                });
            }
        });
    </script>

    <!-- Disqus Embed -->
    <script>
        (function() {
            var d = document,
                s = d.createElement('script');
            s.src = 'https://artikelz-1.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>

    <!-- Stack untuk script tambahan -->
    @stack('scripts')
</body>

</html>
