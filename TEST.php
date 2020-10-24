<html>
    <head><title>TEst</title></head>
    <body>
        <form action="TEST.php" method="POST" enctype="multipart/form-data">
            <input name="Image" type="file">
            <button type="submit" name="submit"><u>Submit</u></button>
        </form>
    </body>
    <?php
    $uploads_dir = 'Files';
    $f_type = $_FILES["Image"]["type"];

if ($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type== "image/PNG" OR $f_type== "image/GIF")
{
    $tmp_name = $_FILES["Image"]["tmp_name"];
    $name = $_POST["TitleAB"].'_'.basename($_FILES["Image"]["name"]);
    move_uploaded_file($tmp_name, "$uploads_dir/$name"); 
}
else{
    echo "error";
}
    ?>
</html>