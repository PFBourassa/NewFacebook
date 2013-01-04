//This file is NOT SECURE and will NOT be uploaded to the server.
$target_path = "uploads/";

$target_path = $target_path.basename( $_FILES['uploadedfile']['name']);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path)){
	echo "The file ".basename($_FILES['uploadedfile']['name'])." has been uploaded";
}
else{
	echo "There was an error upoading the file. Please try again!";
}