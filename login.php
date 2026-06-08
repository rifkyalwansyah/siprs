<?php
session_start();
include 'config/koneksi.php';

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
        "SELECT * FROM users WHERE username='$username'"
    );

    $data = mysqli_fetch_assoc($query);

    if($data)
    {
        if($password == $data['password'])
        {
            $_SESSION['id'] = $data['id'];
            $_SESSION['nama'] = $data['nama'];

            header("Location: dashboard.php");
            exit;
        }
        else
        {
            echo "<script>alert('Password Salah!');</script>";
        }
    }
    else
    {
        echo "<script>alert('Username Tidak Ditemukan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login SIPRS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .login-box{
            margin-top:100px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="row justify-content-center login-box">

        <div class="col-md-4">

            <div class="card shadow">

                <div class="card-header text-center">
                    <h3>LOGIN SIPRS</h3>
                </div>

                <div class="card-body">

                    <form method="POST">

                        <div class="mb-3">
                            <label>Username</label>

                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required>
                        </div>

                        <button
                            type="submit"
                            name="login"
                            class="btn btn-primary w-100">

                            Login

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>