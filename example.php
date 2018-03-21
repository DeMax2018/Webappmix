<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<script src='https://cdn.jsdelivr.net/jquery.cloudinary/1.0.18/jquery.cloudinary.js' type='text/javascript'></script>
<script src="//widget.cloudinary.com/global/all.js" type="text/javascript"></script>
<script src="/script.js"></script>
<title>AJAX File Upload With Cloudinary</title>
</head>
<body>
<form id="file-form" action="fileUpload.php" method="post" enctype="multipart/form-data">
    Upload a File:
    <input type="file" id="myfile" name="myfile">
    <input type="submit" id="submit" name="submit" value="Upload File Now" >
</form>
<p id="status"></p>
<script type="text/javascript" src="fileUpload.js"></script>
</body>
</html>
