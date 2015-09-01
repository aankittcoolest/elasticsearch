<?php

require_once 'app/init.php';

if(!empty($_POST)) {
    if(isset($_POST['title'], $_POST['body'], $_POST['keywords'])) {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $keywords = explode(',', $_POST['keywords']);

        $indexed = $es->index([
            'index' => 'articles',
            'type'  => 'article',
            'body'  => [
                  'title' => $title,
                  'body'  => $body,
                  'keywords' => $keywords
              ]
          ]);

          if($indexed) {
              print_r($indexed);
          }
    }
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add | ES</title>
  </head>
  <body>
      <form class="" action="add.php" method="post" autocomplete="off">
          <label>
              Title
              <input type="text" name="title" value="">
          </label>
          <label>
            Body
            <textarea name="body" rows="8" cols="40"></textarea>
          </label>
          <label>
            Keywords
            <input type="text" name="keywords" value="" placeholder="comma, seperated">
          </label>

          <input type="submit"  value="Add">
      </form>
  </body>
</html>
