<?php 
    include_once "dbh.inc.php";
    
    // initialize variables
    $dog_name = "";
    $born_date = "";
    $castration = "";
    $height = "";
    $weight = "";
    $dog_desc = "";
    $type = "";
    $dog_id_old = "";
    $gender = "";
    $in_memoriam = "";

if (isset($_POST['update'])) {
    $dog_name = mysqli_real_escape_string($conn, $_POST['dog_name']);
    $born_date = $_POST['born_date'];
    $dog_id_old=$_POST['dog_id_old'];
    $castration = mysqli_real_escape_string($conn, $_POST['castration']);
    $height = mysqli_real_escape_string($conn, $_POST['height']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $dog_desc = mysqli_real_escape_string($conn, $_POST['dog_desc']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $in_memoriam = $_POST['in_memoriam'];
    $id = $_POST['id'];
    mysqli_query($conn, "UPDATE dog SET  dog_name='$dog_name',  born_date='$born_date', castration='$castration',  height='$height', weight='$weight', dog_desc='$dog_desc', type='$type', gender='$gender', dog_id_old='$dog_id_old', in_memoriam='$in_memoriam' WHERE dog_id='$id'");
    $_SESSION['message'] = "dog updated!"; 
    header('location: ../edit_dogs.php?success');
}
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $sql="SELECT dog_id, main_image_dog, image_dog FROM dog LEFT JOIN main_image_dog ON dog.dog_id = main_image_dog.fk_dog_id LEFT JOIN image_dog ON dog.dog_id = image_dog.fk_dog_id WHERE dog.dog_id = $id";
    $result = mysqli_query($conn, $sql);
    $data = array();
    while($row = mysqli_fetch_array($result)){
            $data[$row['dog_id']]['main_image'] = $row['main_image_dog'];
            $data[$row['dog_id']]['image_dog'][$row["image_dog"]] = array();
    };
    foreach ($data as $row) {
        //file_exists should work as well, but it doesn't
        if(is_file("../../image_upload/".$row["main_image"])){
            unlink("../../image_upload/".$row["main_image"]);
        } else {
            echo '<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                    Main Image not found/deleted!
                    </div>
                </div>
            </div>  
        </div>';
        }
        foreach ($row["image_dog"] as $key => $value) {
            if(is_file("../../image_upload/".$key)){
                unlink("../../image_upload/".$key);
            } else {
                echo '<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                    Image not found/deleted!
                    </div>
                </div>
            </div>  
        </div>';
            }
        }
    }
    mysqli_query($conn, "DELETE FROM dog WHERE dog_id=$id");
    mysqli_query($conn, "DELETE FROM image_dog WHERE fk_dog_id=$id");
    mysqli_query($conn, "DELETE FROM main_image_dog WHERE fk_dog_id=$id");
    $_SESSION['message'] = '<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                    Record deleted!
                    </div>
                </div>
            </div>  
        </div>';
    
}
?>