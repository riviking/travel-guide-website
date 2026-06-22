<?php
include('includes/db.php');
include('includes/auth.php');

if (is_user_logged_in()) {
    header('Location: profile.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($name === '' || $email === '' || $password === '') {
        $error = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Passwords do not match.';
    } else {
        $check = $conn->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        $check->bind_param('s', $email);
        $check->execute();
        $existing = $check->get_result();

        if ($existing->num_rows > 0) {
            $error = 'An account already exists with that email.';
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare('INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)');
            $stmt->bind_param('sss', $name, $email, $passwordHash);

            if ($stmt->execute()) {
                $_SESSION['user_id'] = $stmt->insert_id;
                $_SESSION['user_name'] = $name;
                header('Location: profile.php');
                exit();
            }

            $error = 'Could not create your account. Please try again.';
        }
    }
}

include('includes/navbar.php');
?>
<link rel="stylesheet" href="assets/css/account.css">

<main class="account-page">
    <section class="account-card">
        <h1>Create Account</h1>
        <p class="account-muted">Join Travel Guide to save places and build your traveler profile.</p>

        <?php if ($error): ?>
            <div class="alert error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="name">Full name</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" minlength="6" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm password</label>
                <input type="password" id="confirm_password" name="confirm_password" minlength="6" required>
            </div>
            <button class="account-btn" type="submit"><i class="fas fa-user-plus"></i> Create Account</button>
        </form>

        <p class="account-switch">Already have an account? <a class="account-link" href="login.php">Sign in</a></p>
    </section>
</main>

<?php include('includes/footer.php'); ?>
