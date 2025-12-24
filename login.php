<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:tampilDataMhs.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem</title>
    <meta charset="utf-8">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: white;
            padding: 40px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
        }

        .error-message {
            color: #e74c3c;
            padding: 12px;
            background: #fadbd8;
            border-left: 4px solid #e74c3c;
            margin-bottom: 20px;
        }

        .success-message {
            color: #27ae60;
            padding: 12px;
            background: #d5f4e6;
            border-left: 4px solid #27ae60;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>LOGIN SISTEM</h2>
        
        <?php
        if (isset($_POST['login'])) {
            require "connection.php";
            $username = mysqli_real_escape_string($conn, $_POST['nim']);
            $password = $_POST['passw'];
            
            // Ambil data user berdasarkan NIM
            $sql = "SELECT * FROM mhs WHERE nim='$username' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($query) == 1) {
                $data = mysqli_fetch_assoc($query);
                
                // Cek apakah kolom pass ada dan tidak kosong
                if (!empty($data['pass'])) {
                    // Cek password hash
                    if (password_verify($password, $data['pass'])) {
                        $_SESSION['username'] = $data['nim'];
                        header("location:tampilDataMhs.php");
                        exit;
                    } else {
                        echo "<div class='error-message'>Password salah!</div>";
                    }
                } else {
                    echo "<div class='error-message'>Password belum diatur untuk user ini!</div>";
                }
            } else {
                echo "<div class='error-message'>NIM tidak ditemukan!</div>";
            }
        }
        ?>

        <form method="post">
            <div class="form-group">
                <label for="nim">NIM :</label>
                <input type="text" id="nim" name="nim" required autofocus>
            </div>

            <div class="form-group">
                <label for="passw">Password :</label>
                <input type="password" id="passw" name="passw" required>
            </div>

            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>
