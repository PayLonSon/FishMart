<?php
/**
 * Title: Upload Media template
 * Slug: twentytwentyfour/media-input
 * Template Types: front-page, home
 * Viewport width: 1400
 * Inserter: no
 */

require_once(ABSPATH . 'wp-load.php');
/*require_once(ABSPATH . 'plpublic.php');

// WooCommerce API 地址
$api_url = getWooCommerceUrl();
echo $api_url.'products' ;


    // WooCommerce REST API 地址和凭证
    $url = $api_url.'products';
    $consumer_key = getWooConsumer_key();
    $consumer_secret = getWooConsumer_secret();


*/
if (isset($_POST['submit']) && !empty($_FILES['photo'])) {
    $uploaded_file = $_FILES['photo'];
    // 检查是否上传成功
    if ($uploaded_file['error'] === UPLOAD_ERR_OK) {
        // 获取上传文件的临时路径
        $tmp_name = $uploaded_file['tmp_name'];

        // 将文件移动到 WordPress 的上传目录中
        $upload_dir = wp_upload_dir();
        $file_name = basename($uploaded_file['name']);
        $file_path = $upload_dir['path'] . '/' . $file_name;
        move_uploaded_file($tmp_name, $file_path);

        // 获取上传文件的 URL
        $file_url = $upload_dir['url'] . '/' . $file_name;

        // 输出上传图像的 <img> 标签
        echo '<img src="' . esc_url($file_url) . '" alt="Uploaded Image">';

    } else {
        echo '上传文件出错：' . $uploaded_file['error'];
    }
    
} else {
    echo isset($_POST['submit']);
    echo "No file uploaded.";
}


?>
<script type="text/javascript">

</script>
