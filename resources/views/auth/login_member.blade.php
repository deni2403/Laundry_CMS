<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboar Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite([])
</head>

<body>
    <div class="wrapper">
        <div class="login shadow-sm">
            <div class="login-header d-flex flex-column align-items-center">
                <h1 class="login-header__title">Dashboard</h1>
                <p class="login-header__text">Masuk ke Dashboard !</p>
            </div>
            <div class="login-form">
                <form method="POST" action="{{ route('login.storeMember') }}">
                    @csrf
                    <div class="mb-4">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                            required autofocus>
                    </div>
                    <div class="mb-2 pass-container">
                        <input type="password" class="form-control password-input" name="password" id="password"
                            placeholder="Password" required>
                        <button class="show-btn"><i class="fa-solid fa-eye" style="color: #545454;"></i></button>
                    </div>
                    <div class="d-flex button-container justify-content-center">
                        <button type="submit" class="login-btn">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="/assets/js/login.js"></script>
</body>

</html>
