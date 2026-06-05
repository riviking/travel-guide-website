<?php
session_start();
include('includes/db.php');
include('includes/navbar.php');

if (isset($_POST['signup'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long!";
    } else {
        // Check if username exists
        $stmt = $conn->prepare("SELECT id FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $error = "Username already taken!";
        } else {
            $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);
            if ($stmt->execute()) {
                $success = "Admin account created successfully! <a href='admin-login.php'>Login here</a>";
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    }
}
?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-login-container" style="max-width: 400px; margin: 100px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
    <h2 style="text-align: center;">Admin Signup</h2>
    
    <?php if (isset($error)): ?>
        <div class="alert error" style="color: red; margin-bottom: 15px;"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if (isset($success)): ?>
        <div class="alert success" style="color: green; margin-bottom: 15px;"><?php echo $success; ?></div>
    <?php endif; ?>

    <form action="" method="POST" class="admin-form" id="signupForm">
        <div class="form-group" style="margin-bottom: 15px;">
            <label>Username</label>
            <input type="text" name="username" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label>Password</label>
            <input type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
        <div class="form-group" style="margin-bottom: 20px;">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
        <button type="submit" name="signup" class="btn-submit" style="width: 100%; padding: 10px; background: #333; color: #fff; border: none; cursor: pointer;">
            Register Admin
        </button>
    </form>

    <div style="margin-top: 20px; text-align: center;">
        <a href="admin-login.php">Already have an account? Login</a>
    </div>
</div>

<script>
document.getElementById('signupForm').onsubmit = function(e) {
    const pass = this.password.value;
    const confirm = this.confirm_password.value;

    if (pass.length < 8) {
        e.preventDefault();
        alert("Password must be at least 8 characters long.");
        return false;
    }
    if (pass !== confirm) {
        e.preventDefault();
        alert("Passwords do not match.");
        return false;
    }
    return true;
};
</script>

<?php include('includes/footer.php'); ?>