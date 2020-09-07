<?php
try {
  if ($_POST && $_POST['name']) {
    $name = $_POST['name'] ?: 'name';
    mail('yangtailei66@gmail.com', '官网咨询邮件', $name);
  } else {
    throw new Exception('表单填写错误');
  }
} catch (Exception $e) {
  echo '{"code":"1","data":""}';
  return;
}
echo '{"code":"0","data":""}';