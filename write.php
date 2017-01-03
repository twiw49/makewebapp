<?php include('include/header.php') ?>

  <article>
    <form action="process.php" method="post"> <!-- form에 입력된 정보들은 POST 방식으로 process.php에 보내져서 처리됨  -->
      <div class="form-group">
        <label for="form-title">제목</label>
        <input type="text" class="form-control" name="title" id="form-title" placeholder="제목을 적어주세요.">
      </div>

      <div class="form-group">
        <label for="form-author">작성자</label>
        <input type="text" class="form-control" name="author" id="form-author" placeholder="작성자를 적어주세요.">
      </div>

      <div class="form-group">
        <label for="form-description">본문</label>
        <textarea class="form-control" rows="10" name="description"  id="form-description" placeholder="본문을 적어주세요."></textarea>
      </div>

      <input type="submit" name="name" class="btn btn-default  btn-lg">
      <input type="hidden" role="uploadcare-uploader" />  <!-- uploadcare 버튼 삽입 -->
    </form>
</article>

<?php include('include/footer.php') ?>

<!-- uploadcare JS -->
<script>UPLOADCARE_PUBLIC_KEY = "ff7215f80f4174d9ed83";</script>
<script charset="utf-8" src="//ucarecdn.com/libs/widget/2.10.2/uploadcare.full.min.js"></script>

<!-- 파일을 업로드한 후, 그 이미지를 본문에 삽입하고자 할 경우 -->
<script>
  // role = uploadcare-uploader 인 태그를 업로드 위젯으로 만들어라!
  var singleWidget = uploadcare.SingleWidget( ' [role=uploadcare-uploader] ' );
  // 그 위젯을 통해서 업로드가 끝났을 때,
  singleWidget.onUploadComplete(function(info) {
    // id 값이 description인 태그의 값 뒤에 업로드한 이미지 파일의 주소를 이미지 태그와 함께 첨부해라.
    document.getElementById('form-description').value += '<img src="'+info.cdnUrl+'">'
  });
</script>