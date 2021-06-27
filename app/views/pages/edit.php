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
    <h5 class="my-0 mr-md-auto font-weight-normal">Home</h5>
    <?php if ($data['loggedIn']): ?>
        <a class="btn btn-outline-primary" href="/framework/public/pages/logout">Sign out</a>
    <?php else: ?>
        <a class="btn btn-outline-primary" href="/framework/public/pages/login">Sign in</a>
    <?php endif; ?>
</div>

<div class="container">
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Edit task</h4>
        </div>
        <div class="card-body">
            <form action="/framework/public/pages/edit" method="post">
                <?php if (!is_null($data['transactionStatus'])): ?>
                    <?php if ($data['transactionStatus']): ?>
                        <div class="alert alert-success">
                            Updated successfully
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            Not updated
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <input type="hidden" name="id" value="<?= $data['task']->id ?>">
                <div class="form-row">
                    <div class="col-12 mb-3">
                        <label for="task">Task</label>
                        <input
                                name="task"
                                type="text"
                                class="form-control"
                                id="task"
                                required
                                value="<?= $data['task']->taskText ?>"
                                placeholder="Task"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                        <option
                                value="0"
                            <?= $data['task']->status == 0 ? 'selected' : '' ?>
                        >
                            Not Completed
                        </option>
                        <option
                                value="1"
                            <?= $data['task']->status == 1 ? 'selected' : '' ?>
                        >
                            Completed
                        </option>
                    </select>
                </div>

                <button class="btn btn-primary" type="submit">Submit</button>
                <a href="/framework/public/pages/index"><button class="btn btn-warning" type="button">Back to index</button></a>
            </form>
        </div>
    </div>

</div>
</body>
</html>
