<?php
/**
 * Title: Upload Media template
 * Slug: twentytwentyfour/upload-media
 * Template Types: front-page, home
 * Viewport width: 1400
 * Inserter: no
 */

echo '123';

?>
<form method="POST" enctype="multipart/form-data" id="upload-form" class="card" action="">
    <img src="" alt="Selected Image" id="selected-image" class="mouse_change" style="display: none;"><br>
    <textarea name="photo_info" id="post_text" style="height: 200px;" placeholder="請填寫
    釣獲時間：
    釣獲地點：
    交貨地點：
    釣獲魚種：
    釣獲數量：
    希望售價："></textarea><br>
    <input type="file" name="photo" id="image-input" accept="image/*"><br>
<label for="image-input" id="image-label" class="mouse_change"><br>
        <a class="d-flex align-items-center text-muted mr-4"><br>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image mr-1 icon-md"></svg><br>
        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><br>
        <circle cx="8.5" cy="8.5" r="1.5"></circle>
        <polyline points="21 15 16 10 5 21"></polyline>
        <p></p>
<p class="d-none d-md-block ml-2">圖片上傳</p>
</a><p><a class="d-flex align-items-center text-muted mr-4">        </a><br>
    </p>
<p>可依下述方式撰寫，以利後續作業<br>
    釣獲時間：<br>
    釣獲地點：<br>
    交貨地點：<br>
    釣獲魚種：<br>
    釣獲數量：<br>
    希望售價：</p>
<p>    <button class="btn btn-primary btn-icon-text btn-edit-profile" id="uploadButton"><br>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit btn-icon-prepend">
    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
    </svg> 發布<br>
    </button><br>
</p>
<p><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script><br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script><br>
<script type="text/javascript"><br />
document.getElementById('image-input').addEventListener('change', function() {<br />
    const fileInput = document.getElementById('image-input');<br />
    const selectedImage = document.getElementById('selected-image');<br />
    const file = fileInput.files[0];<br />
    if (file) {<br />
        const reader = new FileReader();<br />
        reader.onload = function(e) {<br />
            selectedImage.src = e.target.result;<br />
            selectedImage.style.display = 'block';<br />
        };<br />
        reader.readAsDataURL(file);<br />
    }<br />
});<br />
document.getElementById('selected-image').addEventListener('click', function() {<br />
    var button2 = document.getElementById('image-input');<br />
    button2.click();<br />
});<br />
document.getElementById('uploadButton').addEventListener('click', function() {<br />
  var file = input.files[0];<br />
  var formData = new FormData();<br />
  formData.append('image', file);<br />
  var xhr = new XMLHttpRequest();<br />
  xhr.open('POST', 'handle_image_upload.php', true);</p>
<p>  xhr.onload = function() {<br />
    if (xhr.status === 200) {<br />
      var response = JSON.parse(xhr.responseText);<br />
      if (response.url) {<br />
        var preview = document.getElementById('preview');<br />
        preview.innerHTML = '<img src="' + response.url + '" alt="Uploaded Image">';<br />
      } else {<br />
        alert('File upload failed');<br />
      }<br />
    } else {<br />
      alert('File upload failed');<br />
    }<br />
  };</p>
<p>  xhr.send(formData);</p>
<p>});<br />
</script></p></label></form>
