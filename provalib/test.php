<!DOCTYPE html>
<html>
<body style="background-color: red">
	<form action="upload.php" method="post" enctype="multipart/form-data">
		Select image to upload:
		<p>
			<input type="file" name="fileToUpload" id="fileToUpload">
		</p>
		<p>
			<input type="submit" value="Upload Image" name="submit">
		</p>
	</form>
	<center>
		<div style="width: 100px;">
		<?php
			$directory = "upload/";
			$images = glob($directory . "*.*");
			
			foreach($images as $image)
			{
				echo $image;
				?>
				<div style="background-color: yellow; height: 100px">
					<img src="<?php echo $image; ?>" width="100px" />
				</div>
				<?php
			}
		?>
		</div>
	</center>
</body>
</html>