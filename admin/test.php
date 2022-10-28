<?php
// Include the database configuration file
include_once 'dbconfig.php';

// Get images from the database
$query = $db->query("SELECT * FROM files");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["image"];
?>
    <img src="<?php echo $imageURL; ?>" alt="<?php echo $imageURL; ?>" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>