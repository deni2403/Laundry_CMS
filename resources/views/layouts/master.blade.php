<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alza Laundry | Dashboard</title>
    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/style-cms.css">

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
    @vite([])
</head>

<body>
    @include('components.cms.navbar')

    <div class="wrapper d-flex">
        @include('components.cms.sidebar')

        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="/assets/js/sidebar.js"></script>
    <script defer src="/assets/js/admin.js"></script>
    <script src="/assets/js/cashier.js"></script>
    <script src="/assets/js/image-preview.js"></script>
<<<<<<< HEAD
    <script>
        // Ambil elemen div dan input
        var customerNameDiv = document.getElementById('customerNameDiv');
        var customerNameInput = document.getElementById('customerName');

        // Periksa apakah input harus dibuat readonly berdasarkan kondisi
        @if (Request::get('member_id'))
            customerNameInput.setAttribute('readonly', 'readonly');
        @endif
    </script>
=======
    <script src="/assets/js/order.js"></script>

>>>>>>> 43a21c00141c065931626936924f5e43d0c6aead
    @include('sweetalert::alert')
</body>

</html>
