<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to YouthLit</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2fe;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            background-color: #ffffff;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container img {
            max-width: 200px;
            height: 40px;
            margin-bottom: 15px;
        }
        .form-container h4 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-container .form-group {
            margin-bottom: 15px;
            text-align: left;
            position: relative; /* Relative positioning for icon placement */
        }
        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px 40px 10px 10px; /* Add padding for icon space */
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f1f1f1;
            color: #333;
        }
        .form-container input[type="text"].error,
        .form-container input[type="password"].error {
            border-color: red;
        }
        .form-container .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #ff589e;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #9264e7;
        }
        .form-container a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #ff589e;
        }
        .form-container a:hover {
            text-decoration: underline;
            color: #9264e7;
        }
        .show-password-toggle {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 1.0em;
            color: #888;
        }
        .show-password-toggle:hover {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <img src="assets/images/yllogo2.png" alt="YouthLit Logo">
        <h4>Login</h4>
        <form action="login.php" method="post">
            <div class="form-group">
                <input 
                    type="text" 
                    name="username" 
                    placeholder="Username *" 
                    value="<?= htmlspecialchars($_POST['username'] ?? ''); ?>" 
                    class="<?= $username_error ? 'error' : ''; ?>" 
                    required>
                <?php if ($username_error): ?>
                    <div class="error-message"><?= htmlspecialchars($username_error); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input 
                    type="password" 
                    name="password" 
                    id="password-field"
                    placeholder="Password *" 
                    class="<?= $password_error ? 'error' : ''; ?>" 
                    required>
                <span class="show-password-toggle" id="toggle-password">show</span>
                <?php if ($password_error): ?>
                    <div class="error-message"><?= htmlspecialchars($password_error); ?></div>
                <?php endif; ?>
            </div>
            <button type="submit">Login</button>
        </form>
        <a href="register.php">Don't have an account? Register now.</a>
        <a href="index.php">Back</a>
    </div>
    <script>
        const passwordField = document.getElementById('password-field');
        const togglePassword = document.getElementById('toggle-password');

        togglePassword.addEventListener('click', () => {
            // Toggle password visibility
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                togglePassword.textContent = 'hide'; // Change to "hide" icon
            } else {
                passwordField.type = 'password';
                togglePassword.textContent = 'show'; // Change back to "show" icon
            }
        });
    </script>
</body>
</html>
