<?php
include('includes/db.php');
include('includes/navbar.php');
?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-container">
    <?php include('components/admin-sidebar.php'); ?>

    <div class="admin-content">
        <h2>Add New Place</h2>
        
        <?php
        if (isset($_POST['submit'])) {
            $name = $conn->real_escape_string($_POST['name']);
            $country_id = intval($_POST['country_id']);
            $location = $conn->real_escape_string($_POST['location']);
            $description = $conn->real_escape_string($_POST['description']);

            $sql = "INSERT INTO places (name, country_id, location, description) 
                    VALUES ('$name', '$country_id', '$location', '$description')";
            
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert success'>Place added successfully!</div>";
            } else {
                echo "<div class='alert error'>Error: " . $conn->error . "</div>";
            }
        }
        ?>

        <form action="" method="POST" class="admin-form">
            <div class="form-group">
                <label>Place Name</label>
                <input type="text" name="name" required placeholder="e.g. Mount Fuji">
            </div>
            
            <div class="form-group">
                <label>Country</label>
                <select name="country_id" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                    <option value="">Select Country</option>
                    <?php
                    $countries = $conn->query("SELECT id, name FROM countries ORDER BY name ASC");
                    while($c = $countries->fetch_assoc()) {
                        echo "<option value='{$c['id']}'>{$c['name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" required placeholder="e.g. Honshu Island">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="5" required placeholder="Enter place details..."></textarea>
            </div>

            <button type="submit" name="submit" class="btn-submit">Save Place</button>
        </form>
    </div>
</div>

<?php include('includes/footer.php'); ?>
