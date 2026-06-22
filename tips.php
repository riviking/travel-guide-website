<?php
include('includes/db.php');
include('includes/navbar.php');
?>

<link rel="stylesheet" href="assets/css/style.css">

<?php

// Fetch tips
$sql = "SELECT * FROM tips ORDER BY created_at DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Database error: " . $conn->error);
}
?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="page-background page-countries" style="background-image: url('assets/images/backgrounds/tips.jpg'); background-size: cover; background-attachment: fixed;">
    <div class="main-content-wrapper">
        <div class="title-container">
            <h1 class="page-title">Tips</h1>
        </div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Tips</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f8;
        }

        .tips-header {
            text-align: center;
            padding: 40px 20px;
        }

        .tip-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            height: 100%;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .tip-card:hover {
            transform: translateY(-5px);
        }

        .tip-category {
            display: inline-block;
            padding: 4px 10px;
            background: #007bff;
            color: white;
            border-radius: 20px;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .tip-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .tip-date {
            font-size: 12px;
            color: gray;
            margin-top: 10px;
        }

        /* ===== Dark Mode Styles ===== */
        body.dark-mode .tips-header {
            background: linear-gradient(180deg, #1f1f1f 0%, #1a1a1a 100%);
        }

        body.dark-mode .tips-header h1 {
            color: #e0e0e0;
        }

        body.dark-mode .tips-header p {
            color: #b0b0b0;
        }

        body.dark-mode .tip-card {
            background: #2a2a2a;
            border: 1px solid rgba(100, 100, 150, 0.2);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        body.dark-mode .tip-card:hover {
            background: #333333;
            box-shadow: 0 8px 25px rgba(30, 144, 255, 0.2);
        }

        body.dark-mode .tip-title {
            color: #e0e0e0;
        }

        body.dark-mode .tip-card p {
            color: #b0b0b0;
        }

        body.dark-mode .tip-date {
            color: #888;
        }

        body.dark-mode .tip-category {
            background: linear-gradient(135deg, #1e90ff, #0077e6);
            color: white;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="tips-header">
        <h1>✈️ Travel Tips</h1>
        <p>Useful advice for smarter and safer travel</p>
    </div>

    <div class="row g-4">

        <?php if ($result->num_rows > 0) { ?>

            <?php while ($row = $result->fetch_assoc()) { ?>

                <div class="col-md-4">

                    <div class="tip-card">

                        <div class="tip-category">
                            <?php echo htmlspecialchars($row['category'] ?? 'General'); ?>
                        </div>

                        <div class="tip-title">
                            <?php echo htmlspecialchars($row['title']); ?>
                        </div>

                        <p>
                            <?php echo substr(htmlspecialchars($row['description']), 0, 120); ?>...
                        </p>

                        <div class="tip-date">
                            📅 <?php echo date('M d, Y', strtotime($row['created_at'])); ?>
                        </div>

                    </div>

                </div>

            <?php } ?>

        <?php } else { ?>

            <p class="text-center">No tips found.</p>

        <?php } ?>

    </div>

</div>

</body>
</html>

<?php include('includes/footer.php'); ?>