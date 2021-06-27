<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>To do list</title>

    <!-- Bootstrap core CSS -->
    <link href="/framework/public/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/framework/public/css/datatables.min.css"/>

    <script type="text/javascript" src="/framework/public/javascript/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/framework/public/javascript/datatables.min.js"></script>
    <script type="text/javascript" src="/framework/public/javascript/javascript.js"></script>

    <!-- Custom styles for this template -->
    <link href="/framework/public/css/style.css" rel="stylesheet">
</head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
    <a class="btn btn-outline-primary" href="/framework/public/pages/index">Home</a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Login</h4>
                </div>
                <div class="card-body">
                    <?php if(isset($data['errors']['login'])): ?>
                        <div class="alert alert-danger">
                            <?= $data['errors']['login'] ?>
                        </div>
                    <?php endif; ?>

                    <form action="/framework/public/pages/login" method="post" autocomplete="off">
                        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

                        <label class="mt-2" for="username">Username</label>
                        <input
                                type="text"
                                name="username"
                                id="username"
                                class="form-control"
                                placeholder="username"
                                required
                                autofocus
                        >

                        <label class="mt-2" for="inputPassword">Password</label>
                        <input
                                type="password"
                                name="password"
                                id="inputPassword"
                                class="form-control"
                                placeholder="Password"
                                required
                        >

                        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
