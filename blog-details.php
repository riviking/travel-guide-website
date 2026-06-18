<?php
include('includes/db.php');
include('includes/navbar.php');

$id = intval($_GET['id'] ?? 0);

// Fetch single blog
$sql = "SELECT * FROM blog WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$blog = $result->fetch_assoc();

if (!$blog) {
    echo "<div class='text-center mt-5'><h2>Blog not found</h2></div>";
    include('includes/footer.php');
    exit;
}

// Image fix
$image = !empty($blog['image'])
    ? 'assets/images/' . $blog['image']
    : 'assets/images/blogs/default.jpg';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($blog['title']); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        .blog-hero {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .blog-img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .blog-content {
            padding: 30px;
        }

        .meta {
            color: gray;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .content {
            font-size: 16px;
            line-height: 1.8;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border-radius: 6px;
            text-decoration: none;
        }

        .back-btn:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="blog-hero">

        <!-- IMAGE -->
        <img src="<?php echo $image; ?>" class="blog-img">

        <div class="blog-content">

            <!-- META -->
            <div class="meta">
                👤 <?php echo htmlspecialchars($blog['author']); ?> |
                📅 <?php echo date('F d, Y', strtotime($blog['created_at'])); ?>
            </div>

            <!-- TITLE -->
            <div class="title">
                <?php echo htmlspecialchars($blog['title']); ?>
            </div>

            <hr>

            <!-- FULL CONTENT -->
            <div class="content">
                <?php echo nl2br(htmlspecialchars($blog['content'])); ?>
            </div>

            <!-- BACK BUTTON -->
            <a href="blog.php" class="back-btn">← Back to Blog</a>

        </div>

    </div>

</div>

</body>
</html>