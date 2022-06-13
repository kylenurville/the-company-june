<?php
session_start();

require "../classes/User.php";
$user_obj   = new User;
$user       = $user_obj->getUser($_GET['id']);
$full_name  = $user['first_name'] . " " . $user['last_name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Delete User</title>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3 mb-0">The Company</h1>
            </a>
            <div class="ms-auto">
                <ul class="navbar-nav">
                    <li class="nav-item"><span class="nav-link"><?= $_SESSION['full_name'] ?></span></li>
                    <li class="nav-item"><a href="../actions/logout.php" class="nav-link text-danger">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main style="padding-top: 80px;" class="container">
        <div class="row justify-content-center">
            <div class="col-3">
                <h2 class="text-center text-danger mb-4">DELETE USER</h2>

                <div class="text-center mb-4">
                    <i class="fa-solid fa-triangle-exclamation text-warning display-4 d-block mb-2"></i>
                    <p class="fw-bold mb-0">Are you sure you want to delete "<?= $full_name ?>"?</p>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="dashboard.php" class="btn btn-secondary w-100">Cancel</a>
                    </div>
                    <div class="col">
                        <form action="../actions/delete-user.php" method="post">
                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                            <button type="submit" class="btn btn-outline-danger w-100">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>