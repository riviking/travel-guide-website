<?php
include('includes/db.php');
include('includes/navbar.php');
?>

<style>
.container {
    max-width: 1100px;
    margin: auto;
    padding: 20px;
}

.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

.card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.card-body {
    padding: 15px;
}

.card-body h3 {
    margin: 0;
    font-size: 18px;
}

.card-body p {
    font-size: 14px;
    color: #555;
}

.btn {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 12px;
    background: #1e90ff;
    color: white;
    text-decoration: none;
    border-radius: 6px;
}
</style>

<div class="container">

<h1>🌍 Countries</h1>

<div class="grid">

<?php
$sql = "SELECT * FROM countries";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>

    <div class="card">

        <img src="assets/images/<?php echo $row['image'] ?? 'default.jpg'; ?>">

        <div class="card-body">
            <h3><?php echo $row['name']; ?></h3>
            <p><?php echo substr($row['description'], 0, 80); ?>...</p>

            <a class="btn" href="country-view.php?id=<?php echo $row['id']; ?>">
                View Country
            </a>
        </div>

    </div>

<?php
    }
} else {
    echo "<p>No countries found.</p>";
}
?>

</div>
</div>

<?php include('includes/footer.php'); ?>