<?php
/**
 * Title: Upload Media template
 * Slug: twentytwentyfour/media-input
 * Template Types: front-page, home
 * Viewport width: 1400
 * Inserter: no
 */

require_once(ABSPATH . 'wp-load.php');
require_once(ABSPATH . 'pl-public.php');





function add_product_to_woocommerce($product_data) {
    // 构建 WooCommerce API 的 URL
    $endpoint = getWooCommerceUrl() . 'products' ;
    //echo $endpoint ;

    // WooCommerce REST API 地址和凭证
    $consumer_key = getWooConsumer_key();
    $consumer_secret = getWooConsumer_secret();


    // 设置请求头
    $headers = [
        'Authorization: Basic ' . base64_encode($consumer_key . ':' . $consumer_secret),
        'Content-Type: application/json',
    ];

    // 使用 cURL 发起 POST 请求
    $ch = curl_init($endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($product_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);

    // 处理响应
    if ($response === false) {
        return 'Error: ' . curl_error($ch);
    } else {
        $product = json_decode($response, true);
        print json_encode($product);
        return $product['id']; // 返回创建的商品的 ID
    }

    // 关闭 cURL 资源
    curl_close($ch);
}


//  photo
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

        
        // 调用函数并添加商品
            if (isset($_POST["photo_info"])) {
            // 获取名为 "photo_info" 的表单字段的值
                $photo_info = $_POST["photo_info"];
        
            // 在这里可以对 $photo_info 进行进一步处理或输出
                // 用正则表达式从字符串中提取信息
                preg_match("/釣獲時間：(.*?)\n/", $photo_info, $matches);
                $catch_time = isset($matches[1]) ? $matches[1] : '待確認';

                preg_match("/釣獲地點：(.*?)\n/", $photo_info, $matches);
                $catch_location = isset($matches[1]) ? $matches[1] : '待確認';

                preg_match("/交貨地點：(.*?)\n/", $photo_info, $matches);
                $delivery_location = isset($matches[1]) ? $matches[1] : '待確認';

                preg_match("/釣獲魚種：(.*?)\n/", $photo_info, $matches);
                $catch_species = isset($matches[1]) ? $matches[1] : '待確認';

                preg_match("/釣獲數量：(.*?)\n/", $photo_info, $matches);
                $catch_quantity = isset($matches[1]) ? $matches[1] : 1;
                $catch_quantity =(is_numeric($catch_quantity)) ? $catch_quantity : 1;

                preg_match("/希望售價：(.*?)\n/", $photo_info, $matches);
                $desired_price = isset($matches[1]) ? $matches[1] : '99.00';
                
            }
        $product_data = [
            'name' => $catch_species, // 商品名称
            'type' => 'simple', // 商品类型（simple, grouped, external, variable）
            'regular_price' => $desired_price, // 商品定价
            'stock_quantity' => $catch_quantity,
            'description' => "Catch Time: $catch_time\nCatch Location: $catch_location\nDelivery Location: $delivery_location\nCatch Species: $catch_species\nCatch Quantity: $catch_quantity\nDesired Price: $desired_price",
            'short_description' => $photo_info,
            'images' => [
                [
                    'src' => $file_url, // 商品图片 URL
                ],
            ],
            'status' => 'draft', // 将商品状态设置为待审核
            // 其他商品属性，如 'sku', 'stock_quantity', 'categories', 'tags' 等
        ];
        $product_id = add_product_to_woocommerce($product_data);
        update_post_meta( $product_id, '_stock', $catch_quantity );
        echo "<ul>\n";
        if ($product_id) {
            echo '<li>Product added successfully. Product ID: ' . $product_id.'</li>';
        } else {
            echo '<li>Failed to add product.</li>';
        }
        //echo json_encode($product_data);
        // 开始条目列表
        // 输出上传图像的 <img> 标签
        echo '<li><img style="height: 200px;margin-left: auto; margin-right: auto;" src="' . esc_url($file_url) . '" alt="Uploaded Image"></li>';
        // 遍历 $product_data 数组
        foreach ($product_data as $key => $value) {
            // 将键和值组合成列表项并输出
            if ($key != 'images'){
                echo "<li><strong>$key:</strong> $value</li>\n";
            }
        }
        // 结束条目列表
        echo "</ul>";
    } else {
        echo '上傳文件文件出錯：' . $uploaded_file['error'];
    }
    
} else {
    echo isset($_POST['submit']);
    echo "No file uploaded.";
}


?>
