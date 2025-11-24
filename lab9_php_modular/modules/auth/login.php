<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-body">

    <?php
    if (isset($_POST['btn_login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']); 

        $query  = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            
            // --- PERBAIKAN DI SINI ---
            $_SESSION['is_login']  = true;
            $_SESSION['user_nama'] = $data['nama_lengkap'];
            $_SESSION['username']  = $data['username']; // <--- INI WAJIB ADA
            // -------------------------
            
            header("Location: index.php?module=dashboard");
            exit;
        } else {
            $error = "Username atau Password salah!";
        }
    }
    ?>

    <div class="container login-wrapper">
        <div class="card shadow-lg card-login">
            <div class="card-header text-center py-3">
                <h4 class="mb-0">Login App</h4>
            </div>
            <div class="card-body p-4">
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="admin" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="admin123" required>
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" name="btn_login" class="btn btn-primary btn-lg">Masuk</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center text-muted border-0">
                &copy; 2024 Praktikum Web
            </div>
        </div>
    </div>

</body>
</html>