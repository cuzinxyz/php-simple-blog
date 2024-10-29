<?php require('includes/config.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta charset="utf-8">
   <title>Blog</title>
   <link rel="stylesheet" href="style/app.css">
</head>

<body>
   <div id="wrapper">

      <div id="header_">
         <div class="blog_title">
            <a href="/">cuzin pro</a>
         </div>
         <ul class="options">
            <li class="option"><a href="#">facebook</a></li>
            <li class="option"><a href="#">github</a></li>
            <li class="option"><a href="#">youtube</a></li>
         </ul>
      </div>

      <div class="body_">
         <div class="Articles">
            <ul class="Articles_items">
               <?php
                  try {
                     $stmt = $db->prepare('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
                     $stmt->execute();
                     $posts = $stmt->fetchAll();

                     foreach ($posts as $row) {
                        echo '
                           <li class="Articles__item">
                              <span class="Articles__item-date">
                                 '. date('d M Y H:i:s', strtotime($row['postDate'])) .'
                              </span>
                              
                              <a href="viewpost.php?id=' . $row['postID'] . '" class="Articles__item-title">
                                 ' . $row['postTitle'] . '
                              </a>
                           </li>
                        ';
                     }
                  } catch (PDOException $e) {
                     echo $e->getMessage();
                  } catch (Exception $e) {
                     echo $e->getMessage();
                  }
               ?>
            </ul>
         </div>
      </div>

      <div class="blog_footer"></div>

   </div>
</body>

</html>