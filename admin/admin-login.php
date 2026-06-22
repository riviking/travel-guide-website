<?php
session_start();
include('../includes/db.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare a statement to fetch the admin's hashed password
    $stmt = $conn->prepare("SELECT id, password FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Compare plain text passwords
        if ($password === $row['password']) {
            $_SESSION['admin_logged_in'] = true;
            header("Location: admin-dashboard.php");
            exit();
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "Invalid username or password";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin-login.php");
    exit();
}

include('../includes/navbar.php');
?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-login-container" style="max-width: 400px; margin: 100px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
    <h2 style="text-align: center;">Admin Login</h2>
    
    <?php if (isset($error)): ?>
        <div class="alert error" style="color: red; margin-bottom: 15px;"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="" method="POST" class="admin-form" id="loginForm">
        <div class="form-group" style="margin-bottom: 15px;">
            <label>Username</label>
            <input type="text" name="username" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
        <div class="form-group" style="margin-bottom: 20px;">
            <label>Password</label>
            <input type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
        <button type="submit" name="login" class="btn-submit" style="width: 100%; padding: 10px; background: #333; color: #fff; border: none; cursor: pointer;">
            Login
        </button>
    </form>

    <div style="margin-top: 20px; text-align: center;">
        <a href="../index.php">Back to Website</a>
    </div>
</div>

<script>
document.getElementById('loginForm').onsubmit = function(e) {
    const user = this.username.value.trim();
    const pass = this.password.value.trim();
    
    if (user === "" || pass === "") {
        e.preventDefault();
        alert("Please fill in all fields.");
        return false;
    }
    return true;
};
</script>

<?php include('../includes/footer.php'); ?>
