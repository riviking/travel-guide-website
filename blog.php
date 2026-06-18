<?php
include('includes/db.php');
include('includes/navbar.php');

// Fetch blog
$sql = "SELECT * FROM blog ORDER BY created_at DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Database error: " . $conn->error);
}
?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="page-background page-countries" style="background-image: url('assets/images/backgrounds/blog.jpg'); background-size: cover; background-attachment: fixed;">
    <div class="main-content-wrapper">
        <div class="title-container">
            <h1 class="page-title">Blogs</h1>
        </div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Blog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        .blog-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            height: 100%;
        }

        .blog-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .blog-body {
            padding: 15px;
        }

        .blog-title {
            font-size: 18px;
            font-weight: bold;
        }

        .blog-meta {
            font-size: 13px;
            color: gray;
            margin-bottom: 10px;
        }

        .btn-read {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background: #007bff;
            color: white;
            border-radius: 6px;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <h2 class="text-center mb-4">Latest Travel Blog</h2>

    <div class="row g-4">

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            // IMAGE FIX
            $image = !empty($row['image'])
                ? 'assets/images/' . $row['image']
                : 'assets/images/blogs/default.jpg';
    ?>

        <div class="col-md-4">

            <div class="blog-card">

                <img src="<?php echo $image; ?>" class="blog-image">

                <div class="blog-body">

                    <div class="blog-meta">
                        👤 <?php echo htmlspecialchars($row['author']); ?> |
                        📅 <?php echo date('M d, Y', strtotime($row['created_at'])); ?>
                    </div>

                    <div class="blog-title">
                        <?php echo htmlspecialchars($row['title']); ?>
                    </div>

                    <p>
                        <?php echo substr(strip_tags($row['content']), 0, 120); ?>...
                    </p>

                    <a href="blog-details.php?id=<?php echo $row['id']; ?>" class="btn-read">
                        Read More →
                    </a>

                </div>

            </div>

        </div>

    <?php
        }
    } else {
        echo "<p class='text-center'>No blogs found</p>";
    }
    ?>

    </div>
</div>

</body>
</html>

<?php include('includes/footer.php'); ?>