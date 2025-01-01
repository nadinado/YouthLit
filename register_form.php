<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register to YouthLit</title>
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
        .main-container img {
            max-width: 200px;
            height: 40px;
            margin-bottom: 15px;
        }
        .main-container {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            background-color: #ffffff;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .register-box h4 {
            margin-bottom: 15px;
            color: #333;
        }
        .register-box .form-group {
            position: relative;
            margin-bottom: 15px;
        }
        .register-box input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f1f1f1;
            color: #333;
        }
        .register-box input[type="submit"] {
            background-color: #ff589e;
            color: white;
            border: none;
            cursor: pointer;
        }
        .register-box input[type="submit"]:hover {
            background-color: #9264e7;
        }
        .required {
            color: red;
        }
        .register-box a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #ff589e;
        }
        .register-box a:hover {
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
<body class="main-layout home_page">
    <div class="main-container">
        <div class="register-box">
            <img src="assets/images/yllogo2.png" alt="YouthLit Logo">
            <h4>Register Now</h4>
            <form action="register.php" method="POST">
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Username *" required>
                </div>

                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Email *" required>
                </div>

                <div class="form-group">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Password *" 
                        required>
                    <span class="show-password-toggle" id="toggle-password">show</span>
                </div>

                <div class="form-group">
                    <input type="text" id="phone" name="phone" placeholder="Phone Number *" required>
                </div>

                <input type="submit" value="Join Now">
            </form>
            <a href="login.php">Already have an account? Login here.</a>
            <a href="index.php">Back</a>
        </div>
    </div>

    <script>
        const passwordField = document.getElementById('password');
        const togglePassword = document.getElementById('toggle-password');

        togglePassword.addEventListener('click', () => {
            // Toggle the password field type
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                togglePassword.textContent = 'hide'; // Change icon to hide
            } else {
                passwordField.type = 'password';
                togglePassword.textContent = 'show'; // Change icon to show
            }
        });
    </script>
</body>
</html>
