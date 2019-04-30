<?php
require_once "includes_admin/navbar.inc.php";
require_once "includes_admin/dbh.inc.php";
require_once "includes_admin/edit_video.inc.php";

	if (isset($_SESSION['userUid']))
	                      {
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$record = mysqli_query($conn, "SELECT * FROM videos WHERE video_id=$id");
		if (mysqli_num_rows($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$title = $n['title'];
			$url = $n['url'];
		}
	}
$results = mysqli_query($conn, "SELECT * FROM videos");
?>
<style>
.red {
background-color: red;
}
</style>
<link rel="stylesheet" type="text/css" href="../../css/users.css">
<div class="container-fluid">
	<div class="row">
	<div class="col-md-10 offset-md-2 users_content">
		<?php if(isset($_GET['success'])){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Success!</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }  ?>
		<div class="card card_adminpanel">
		<div class="card-body">
			
		<table class="table bordered">
	<thead>
		<tr>
			<th>title</th>
			<th>url</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['url']; ?></td>
			<td>
				<a href="edit_video.php?edit=<?php echo $row['video_id'] ?>" class="btn btn-info">Edit</a>
			</td>
			<td>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['video_id'] ?>">
        Delete
      </button>
            </td>
            <!-- Modal -->
      <div class="modal fade" id="deleteModal<?php echo $row['video_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?php echo $languages[$x]["modal_title"] ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><?php echo $languages[$x]["modal_question"] ?></p>
              <p><?php echo $languages[$x]["edit_title"] ?>: <?php echo $row['title'] ?></p>
              <p>url: <?php echo $row['url'] ?></p>
            </div>
            <div class="modal-footer">
              <a href="edit_video.php?del=<?php echo $row['video_id'] ?>" class="btn btn-danger"><?php echo $languages[$x]["up_del_btn"] ?></a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      </tr>
        <?php } ?>
</table>
</div>
</div>
	</div>
		<div class="inputform">
			<form method="post" action="includes_admin/edit_video.inc.php" >
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<div class="input-group form-group">
					<label class="col">Title: </label>
					<input class="form-control" type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
				</div>
				<div class="input-group form-group">
					<label class="col"><p><span class="grey">URL : Please copy just this part as in example: https://www.youtube.com/watch?v=</span><span class="red">8j741TUIET0</span></p></label>
					<input class="form-control" type="text" name="url" value="<?php echo htmlspecialchars($url); ?>">
				</div>
				<button class="btn btn-center" type="submit" name="update">update</button>
			</form>
		</div>
</div>
	</div>

<?php
require_once("includes_admin/footer.inc.php");
 }; ?>