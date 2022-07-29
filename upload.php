<?php
    function checkFile($file, $size = 0, $exts = array())
    {
        global $dir;

        if($file == null) return false;
        if($size > 0) {
            if(filesize($file['tmp_name']) > $size) return false;
        }
        if(!empty($exts)) {
            $ext = pathinfo($file['full_path'], PATHINFO_EXTENSION);
            if(!in_array($ext, $exts)) return false;
        }
        if(file_exists($dir . '/uploads' . '/' .$file['name'])) {
            return false;
        }
        return true;
    }

    $success = '<p id="success">File uploaded successfully!</p>';
    $error = '<p id="error">There was an error while uploading file!</p>';

    $dir = __DIR__;
    
    if(checkFile($_FILES['fileSelect'], 0, array('jpg', 'png')))
    {
        $target = __DIR__ . '/uploads' . '/' .$_FILES['fileSelect']['name'];
        if(move_uploaded_file($_FILES['fileSelect']['tmp_name'], $target)) echo $success; die;
    }
    echo $error; die;
?>

