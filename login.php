
<style>
    /* styles.css */

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #9932cc; /* Dark blue background */
    margin: 0;
    font-family: Arial, sans-serif;
}

.login-container {
    background: #ffffff; /* White background */
    padding: 20px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 300px;
}

.login-container h2 {
    background-color: #301934; /* Light blue header */
    color: white;
    padding: 10px;
    border-radius: 10px 10px 0 0;
    margin: -40px -40px 20px -40px;
}

.form-group {
    margin-bottom: 20px;
    text-align: left;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #333333;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    font-size: 0.9em;
}

.form-options label {
    display: flex;
    align-items: center;
}

.form-options input {
    margin-right: 5px;
}

.forgot-password {
    color: #1e88e5; /* Light blue text */
    text-decoration: none;
}

.forgot-password:hover {
    text-decoration: underline;
}

button {
    background-color: #0d3b66; /* Dark blue button */
    border: none;
    color: white;
    padding: 15px 0;
    width: 100%;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0b2c50; /* Darker blue on hover */
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="auth.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="admin_username" name="admin_username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="admin_password" name="admin_password" required>
            </div>
            <div class="form-options">
                <label><input type="checkbox" name="remember"> Remember me</label>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
