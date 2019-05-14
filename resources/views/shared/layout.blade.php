<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ config('app.name') }} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('shared.navbar')

    <div style="min-height: 90vh">
        @yield('content')
    </div>

    <footer class="bg-dark text-light py-3">
        <div class="container text-center">
            Copyright {{ today()->format('Y') }} © Konservasi Hutan Mangrove
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('extra-scripts')

    <script>
        $(document).ready(function() {
            $(".btn-delete").each((index, elem) => {
                $(elem).parent().submit(function(e) {
                    e.preventDefault()

                    let form = this

                    swal("Apakah Anda yakin ingin melakukan tindakan ini?", {
                        dangerMode: true,
                        icon: "warning",
                        buttons: {
                            cancel: "Tidak",
                            confirm: "Ya"
                        },
                    })
                    .then(will_submit => {
                        if (will_submit) {
                            $(form).off("submit").submit()
                        }
                    })
                })
            })
        })
    </script>
</body>
</html>