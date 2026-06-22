<?php
include('includes/db.php');
include('includes/navbar.php');

$sql = "SELECT * FROM blog ORDER BY created_at DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Database error: " . $conn->error);
}
?>

<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .blog-page {
        min-height: 100vh;
        padding: 56px 20px 72px;
        background: url('assets/images/backgrounds/blog.jpg') center / cover fixed;
    }

    .blog-shell {
        max-width: 1620px;
        margin: 0 auto;
    }

    .blog-page-title {
        color: #ffffff;
        font-size: clamp(2.4rem, 6vw, 3.8rem);
        font-weight: 800;
        margin-bottom: 70px;
        text-shadow: 0 3px 14px rgba(15, 23, 42, 0.42);
    }

    .blog-section-title {
        color: #111827;
        font-size: clamp(2rem, 4vw, 2.6rem);
        font-weight: 500;
        text-align: center;
        margin-bottom: 30px;
    }

    .blog-card {
        height: 100%;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid rgba(15, 23, 42, 0.08);
        border-radius: 10px;
        box-shadow: 0 16px 38px rgba(15, 23, 42, 0.15);
        transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        border-color: rgba(37, 99, 235, 0.32);
        box-shadow: 0 24px 46px rgba(15, 23, 42, 0.2);
    }

    .blog-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        display: block;
        transition: transform 0.3s ease;
    }

    .blog-card:hover .blog-image {
        transform: scale(1.04);
    }

    .blog-body {
        padding: 20px;
    }

    .blog-meta {
        color: #64748b;
        font-size: 0.88rem;
        margin-bottom: 14px;
    }

    .blog-meta i {
        color: #5b35b1;
        margin-right: 5px;
    }

    .blog-title {
        color: #111827;
        font-size: 1.22rem;
        font-weight: 800;
        line-height: 1.35;
        margin-bottom: 8px;
    }

    .blog-body p {
        color: #1f2937;
        font-size: 1.03rem;
        line-height: 1.48;
        margin-bottom: 22px;
    }

    .btn-read {
        display: inline-block;
        padding: 9px 16px;
        background: #0b84ff;
        color: #ffffff;
        border-radius: 6px;
        font-weight: 700;
        text-decoration: none;
        transition: background 0.2s ease, transform 0.2s ease;
    }

    .btn-read:hover {
        background: #0069d9;
        color: #ffffff;
        text-decoration: none;
        transform: translateY(-1px);
    }

    .blog-empty {
        color: #111827;
        font-weight: 700;
        text-align: center;
    }

    body.dark-mode .blog-page {
        background:
            linear-gradient(rgba(3, 7, 18, 0.52), rgba(3, 7, 18, 0.72)),
            url('assets/images/backgrounds/blog.jpg') center / cover fixed;
    }

    body.dark-mode .blog-page-title {
        color: #f8fafc;
        text-shadow: 0 4px 18px rgba(0, 0, 0, 0.75);
    }

    body.dark-mode .blog-section-title {
        color: #f8fafc;
        text-shadow: 0 3px 14px rgba(0, 0, 0, 0.45);
    }

    body.dark-mode .blog-card {
        background: #111827;
        border-color: #263244;
        box-shadow: 0 18px 44px rgba(0, 0, 0, 0.45);
    }

    body.dark-mode .blog-card:hover {
        background: #162033;
        border-color: #3b82f6;
        box-shadow: 0 24px 54px rgba(0, 0, 0, 0.58);
    }

    body.dark-mode .blog-meta {
        color: #aab7c8;
    }

    body.dark-mode .blog-title {
        color: #f8fafc;
    }

    body.dark-mode .blog-body p {
        color: #dbe4ef;
    }

    body.dark-mode .blog-empty {
        color: #f8fafc;
    }

    @media (max-width: 768px) {
        .blog-page {
            padding: 36px 14px 56px;
            background-attachment: scroll;
        }

        body.dark-mode .blog-page {
            background-attachment: scroll;
        }

        .blog-page-title {
            margin-bottom: 42px;
        }

        .blog-image {
            height: 210px;
        }
    }
</style>

<main class="blog-page">
    <div class="blog-shell">
        <h1 class="blog-page-title">Blogs</h1>
        <h2 class="blog-section-title">Latest Travel Blog</h2>

        <div class="row g-4">
            <?php if ($result->num_rows > 0) { ?>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <?php
                    $image = !empty($row['image'])
                        ? 'assets/images/' . $row['image']
                        : 'assets/images/blogs/default.jpg';
                    ?>

                    <div class="col-md-4">
                        <article class="blog-card">
                            <img src="<?php echo htmlspecialchars($image); ?>" class="blog-image" alt="<?php echo htmlspecialchars($row['title']); ?>">

                            <div class="blog-body">
                                <div class="blog-meta">
                                    <i class="fas fa-user"></i>
                                    <?php echo htmlspecialchars($row['author']); ?>
                                    <span>|</span>
                                    <i class="fas fa-calendar-alt"></i>
                                    <?php echo date('M d, Y', strtotime($row['created_at'])); ?>
                                </div>

                                <div class="blog-title">
                                    <?php echo htmlspecialchars($row['title']); ?>
                                </div>

                                <p>
                                    <?php echo substr(strip_tags($row['content']), 0, 120); ?>...
                                </p>

                                <a href="blog-details.php?id=<?php echo $row['id']; ?>" class="btn-read">
                                    Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="blog-empty">No blogs found.</p>
            <?php } ?>
        </div>
    </div>
</main>

<?php include('includes/footer.php'); ?>
