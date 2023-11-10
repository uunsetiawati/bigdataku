<!DOCTYPE html>
<html lang="en">  
<head>
<title>CodeIgniter File Upload and Validation by CodexWorld</title>
</head>
<body>
<div class="container">
    <h1>CodeIgniter File Upload and Validation by CodexWorld</h1>
    <div class="row">
		<?php 
			if(!empty($success_msg)){
				echo '<p class="statusMsg">'.$success_msg.'hehe'.'</p>';
			}elseif(!empty($error_msg)){
				echo '<p class="statusMsg">'.$error_msg.'hehe'.'</p>';
			}
		?>
		<form method="post" enctype="multipart/form-data">
			<p><input type="file" name="file"/>
			<?php echo form_error('file','<span class="help-block">','</span>'); ?></p>
			<p><input type="submit" name="uploadFile" value="UPLOAD"/></p>
		</form>
    </div>
</div>
</body>
</html>