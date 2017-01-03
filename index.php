<?php include('include/header.php') ?> <!-- page에서 중복되는 부분은 하나의 파일을 만들어서, 그 파일을 불러오는 것으로 대체할 수 있음 -->

  <article>

    <?php
      if(empty($_GET['id']) === false ) {
        $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id={$_GET['id']}";    // id는 자동생성되는 정보이므로, 신뢰할 수 있는 정보임	// id 는 topic 테이블에도 있고, user 테이블에도 있으므로, 어떤 테이블의 값인지를 명시하는 것이 필요함 (topic.id)	// FROM topic JOIN user : topic 테이블과 user 테이블을 조인할 경우, 왼쪽(topic)을 기준으로 병합할 때, LEFT JOIN 사용!
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '<h2>'.htmlspecialchars($row['title']).'</h2>'."\n";;	// 사용자가 입력한 정보이므로, 보호해야 함
        echo '<p>'.htmlspecialchars($row['name']).'</p>'."\n";;	// 사용자가 입력한 정보이므로, 보호해야 함
        echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><h6><p><div><ul><ol><li><img>');	/* htmlspecialchars는 모든 태그들을 escaping 하지만, strip_tags는 두번째 입력값에 escaping을 피하고 싶은 태그들을 따로 설정할 수 있음  */
      }
    ?>
  </article>

<?php include('include/footer.php') ?> <!-- page에서 중복되는 부분은 하나의 파일을 만들어서, 그 파일을 불러오는 것으로 대체할 수 있음 -->