<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Propay Login</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h4>Login</h4>

                    <form method="post" action="{{ route('login') }}" accept-charset="UTF-8">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="form-label" for="username">Username</label>
                            <input class="form-control" type="text" name="username" />
                        </div>

                        <div class="form-group mt-2">
                            <label class="form-label" for="Password">Password</label>
                            <input class="form-control" type="password" name="password" />
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 btn-block enter-btn">Login</button>

                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
