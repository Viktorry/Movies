<?php

class UploadPicture
{
    public function uploadPicture()
    {
        if (isset($_POST['upload'])) {
            $image = $_FILES['image']['name'];
            $target = $_SERVER['DOCUMENT_ROOT'] . "/Views/img/" . basename($image);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target);
            $insert = new Model();
            $inspic = $insert->insertPictures($image);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            } else {
                $msg = "Failed to upload image";
            }
        }
    }

    public function showPicture()
    {
        $insert1 = new Model();
        $result = $insert1->getAllpictures();
        return $result;
    }
}
