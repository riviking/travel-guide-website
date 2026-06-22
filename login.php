<?php
include('includes/db.php');
include('includes/auth.php');

if (is_user_logged_in()) {
    header('Location: profile.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $error = 'Please enter your email and password.';
    } else {
        $stmt = $conn->prepare('SELECT id, name, password_hash FROM users WHERE email = ? LIMIT 1');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = (int) $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header('Location: profile.php');
            exit();
        }

        $error = 'Invalid email or password.';
    }
}

include('includes/navbar.php');
?>
<link rel="stylesheet" href="assets/css/account.css">

<main class="account-page">
    <section class="account-card">
        <h1>Welcome Back</h1>
        <p class="account-muted">Sign in to manage your profile and saved travel places.</p>

        <?php if ($error): ?>
            <div class="alert error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button class="account-btn" type="submit"><i class="fas fa-right-to-bracket"></i> Sign In</button>
        </form>

        <p class="account-switch">New here? <a class="account-link" href="register.php">Create an account</a></p>
    </section>
</main>

<?php include('includes/footer.php'); ?>
