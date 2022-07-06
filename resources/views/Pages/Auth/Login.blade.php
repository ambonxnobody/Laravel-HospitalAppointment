<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} · Appointment</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
</head>

<body class="text-center">
    @include('sweetalert::alert')

    <main class="form-signin w-100 m-auto">
        <form action="/login" method="POST">
            @csrf
            <h3 class="text-danger mb-5">Prefixcon Appointment</h3>
            <h1 class="h3 mb-3 fw-normal">{{ $title }}</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email address"
                    autofocus required>
                <label for="email">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                    required>
                <label for="password">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input checked type="checkbox" name="remember_me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-danger" type="submit">{{ $title }}</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022 · Preficon Developer. All Rights Reserved.</p>
        </form>
    </main>



</body>

</html>
