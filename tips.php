<?php
include('includes/db.php');
include('includes/navbar.php');

$sql = "SELECT * FROM tips ORDER BY created_at DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Database error: " . $conn->error);
}
?>

<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .tips-page {
        min-height: 100vh;
        padding: 56px 20px 72px;
        background: url('assets/images/backgrounds/tips.jpg') center / cover fixed;
    }

    .tips-shell {
        max-width: 1170px;
        margin: 0 auto;
    }

    .tips-page-title {
        color: #ffffff;
        font-size: clamp(2.4rem, 6vw, 3.8rem);
        font-weight: 800;
        margin-bottom: 34px;
        text-shadow: 0 3px 14px rgba(15, 23, 42, 0.38);
    }

    .tips-header {
        text-align: center;
        padding: 42px 24px;
        margin-bottom: 10px;
        color: #0f172a;
    }

    .tips-header h1 {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 14px;
        color: #0f172a;
        font-size: clamp(2rem, 5vw, 3rem);
        font-weight: 500;
        margin-bottom: 10px;
    }

    .tips-header p {
        color: #1f2937;
        font-size: 1.08rem;
        margin: 0;
    }

    .tip-card {
        height: 100%;
        padding: 26px;
        background: #ffffff;
        border: 1px solid rgba(15, 23, 42, 0.08);
        border-radius: 10px;
        box-shadow: 0 16px 38px rgba(15, 23, 42, 0.13);
        transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }

    .tip-card:hover {
        transform: translateY(-5px);
        border-color: rgba(37, 99, 235, 0.3);
        box-shadow: 0 24px 44px rgba(15, 23, 42, 0.18);
    }

    .tip-category {
        display: inline-block;
        padding: 6px 13px;
        background: #0b84ff;
        color: #ffffff;
        border-radius: 999px;
        font-size: 0.78rem;
        font-weight: 600;
        margin-bottom: 16px;
    }

    .tip-title {
        color: #0f172a;
        font-size: 1.22rem;
        font-weight: 800;
        margin-bottom: 14px;
    }

    .tip-card p {
        color: #111827;
        font-size: 1.03rem;
        line-height: 1.5;
        margin-bottom: 22px;
    }

    .tip-date {
        color: #64748b;
        font-size: 0.86rem;
    }

    .tips-empty {
        color: #0f172a;
        font-weight: 600;
        text-align: center;
    }

    body.dark-mode .tips-page {
        background:
            linear-gradient(rgba(3, 7, 18, 0.56), rgba(3, 7, 18, 0.72)),
            url('assets/images/backgrounds/tips.jpg') center / cover fixed;
    }

    body.dark-mode .tips-page-title {
        color: #f8fafc;
        text-shadow: 0 4px 18px rgba(0, 0, 0, 0.7);
    }

    body.dark-mode .tips-header {
        color: #f8fafc;
    }

    body.dark-mode .tips-header h1 {
        color: #f8fafc;
    }

    body.dark-mode .tips-header p {
        color: #cbd5e1;
    }

    body.dark-mode .tip-card {
        background: #111827;
        border-color: #263244;
        box-shadow: 0 18px 44px rgba(0, 0, 0, 0.42);
    }

    body.dark-mode .tip-card:hover {
        background: #162033;
        border-color: #3b82f6;
        box-shadow: 0 24px 54px rgba(0, 0, 0, 0.55);
    }

    body.dark-mode .tip-title {
        color: #f8fafc;
    }

    body.dark-mode .tip-card p {
        color: #dbe4ef;
    }

    body.dark-mode .tip-date {
        color: #aab7c8;
    }

    body.dark-mode .tips-empty {
        color: #f8fafc;
    }

    @media (max-width: 768px) {
        .tips-page {
            padding: 36px 14px 56px;
            background-attachment: scroll;
        }

        body.dark-mode .tips-page {
            background-attachment: scroll;
        }

        .tips-header {
            padding: 22px 8px;
        }

        .tip-card {
            padding: 22px;
        }
    }
</style>

<main class="tips-page">
    <div class="tips-shell">
        <h1 class="tips-page-title">Tips</h1>

        <section class="tips-header" aria-label="Travel tips introduction">
            <h1><i class="fas fa-plane" aria-hidden="true"></i> Travel Tips</h1>
            <p>Useful advice for smarter and safer travel</p>
        </section>

        <div class="row g-4">
            <?php if ($result->num_rows > 0) { ?>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="col-md-4">
                        <article class="tip-card">
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
                                <i class="fas fa-calendar-alt"></i>
                                <?php echo date('M d, Y', strtotime($row['created_at'])); ?>
                            </div>
                        </article>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="tips-empty">No tips found.</p>
            <?php } ?>
        </div>
    </div>
</main>

<?php include('includes/footer.php'); ?>
