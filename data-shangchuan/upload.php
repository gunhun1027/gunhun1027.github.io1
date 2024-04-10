<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = 'uploads/'; // 上传目录，请确保这个目录存在并且有写入权限
    $targetFile = $targetDir . basename($_FILES['file']['name']); // 目标文件路径
    $uploadOk = 1;

    // 检查文件是否已经存在
    if (file_exists($targetFile)) {
        echo '对不起，文件已经存在.';
        $uploadOk = 0;
    }

    // 检查文件大小（如果需要）
    if ($_FILES['file']['size'] > 5000000) { // 例如，限制文件大小为5MB
        echo '文件过大.';
        $uploadOk = 0;
    }

    // 检查文件是否被成功上传
    if (empty($_FILES['file']['name'])) {
        echo '文件上传失败.';
        $uploadOk = 0;
    }

    // 如果一切正常，尝试上传文件
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
            echo '文件上传成功!';
        } else {
            echo '文件上传失败!';
        }
    }
}
?>