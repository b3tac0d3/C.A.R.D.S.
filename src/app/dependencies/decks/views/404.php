<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Error!</title>
        <!-- Bootstrap core CSS --> 
        <!-- <link href="src/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <meta name="theme-color" content="#7952b3">
    </head>

    <body>
        <div class="text-center">
            <p class="fs-3"><?=constant("error_message")?></p>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <div class="text-center">
                <h1 class="display-1 fw-bold">404</h1>                
                <p class="fs-3"> <span class="text-danger">Oh no!</span> Page not found.</p>
                <p class="lead">
                    The page you’re looking for doesn’t exist.
                  </p>
                <a href="home" class="btn btn-primary">Go Home</a>
            </div>
        </div>
    </body>
</html>