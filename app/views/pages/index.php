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
    <?php if ($data['loggedIn']):?>
    <a class="btn btn-outline-primary" href="/framework/public/pages/logout">Sign out</a>
    <?php else: ?>
    <a class="btn btn-outline-primary" href="/framework/public/pages/login">Sign in</a>
    <?php endif; ?>
</div>

<div class="container">
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Add New</h4>
        </div>
        <div class="card-body">
            <form action="/framework/public/pages/index" method="post">
                <?php if (!is_null($data['transactionStatus'])): ?>
                    <?php if ($data['transactionStatus']): ?>
                        <div class="alert alert-success">
                            Inserted successfully
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            Not inserted
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="username">User name</label>
                        <input
                                name="username"
                                type="text"
                                class="form-control<?= isset($data['errors']['username']) ? ' is-invalid' : '' ?>"
                                id="username"
                                placeholder="User name"
                                required
                                value="<?= isset($data['formData']['username']) ? $data['formData']['username'] : '' ?>"
                        >
                        <?php if (isset($data['errors']['username'])): ?>
                            <div class="text-danger">
                                <?= $data['errors']['username'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input
                                name="email"
                                type="email"
                                class="form-control<?= isset($data['errors']['email']) ? ' is-invalid' : '' ?>"
                                id="email"
                                placeholder="Email"
                                value="<?= isset($data['formData']['email']) ? $data['formData']['email'] : '' ?>"
                                required
                        >
                        <?php if (isset($data['errors']['email'])): ?>
                            <div class="text-danger">
                                <?= $data['errors']['email'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 mb-3">
                        <label for="task">Task</label>
                        <input
                                name="task"
                                type="text"
                                class="form-control<?= isset($data['errors']['task']) ? ' is-invalid' : '' ?>"
                                id="task"
                                value="<?= isset($data['formData']['task']) ? $data['formData']['task'] : '' ?>"
                                required
                                placeholder="Task"
                        >
                        <?php if (isset($data['errors']['task'])): ?>
                            <div class="text-danger">
                                <?= $data['errors']['task'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">To Do list</h4>
        </div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>User name</th>
                    <th>email</th>
                    <th>Task</th>
                    <th>Status</th>
                    <?php if ($data['loggedIn']):?>
                    <th>Edit</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data['todos'] as $key => $todo) :
                    ?>
                    <tr>
                        <td><?= ++$key ?></td>
                        <td><?= $todo->userName ?></td>
                        <td><?= $todo->email ?></td>
                        <td><?= $todo->taskText ?></td>
                        <td><?= $todo->status ? 'Completed' : 'Not Completed' ?></td>
                        <?php if ($data['loggedIn']):?>
                        <td><a href="/framework/public/pages/edit?id=<?= $todo->id ?>">Edit</a> </td>
                        <?php endif; ?>
                    </tr>
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>
