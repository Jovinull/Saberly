<!doctype html>
<html lang="pt-BR">

<head>
    @include('backend.section.link')
    <title>Saberly - Painel do Instrutor</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">

        <!--sidebar wrapper -->
        @include('backend.instructor.sidebar')

        <!--start header -->
        @include('backend.instructor.header')

        <!--start page wrapper -->
        <div class="page-wrapper">

            @yield('content')

        </div>
        <!--end page wrapper -->

        @include('backend.section.footer')

    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    @include('backend.section.script')
</body>

</html>