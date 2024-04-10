<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
  echo "文件上传成功！";
} else {
  echo "文件上传失败！";
}
?>
