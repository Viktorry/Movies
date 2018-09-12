<?php

class uploadVideo
{
    public function uploadVideo()
    {
        if (isset($_POST['submit'])) {
            $name = $_FILES['file']['name'];
            $temp = $_FILES['file']['tmp_name'];
            $target = Message::imagePath();
            move_uploaded_file($temp, $target . $name);
            $url = "http://127.0.0.1/PHP/video%20upload%20and%20playback/img/$name";
            $upl = new Model();
            $mov = $upl->inserVideos($name, $url);
            if (move_uploaded_file($temp, $target . $name)) {
                $msg = "Video uploaded successfully";
            } else {
                $msg = "Failed to upload video";
            }
        }
    }

    public function showVideo()
    {

        $id = $_GET['id'];
        $insert1 = new Model();
        $result = $insert1->getVideosbyid($id);
        return $result;
    }

}