<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8">
      <title>Blog</title>
      <link rel="stylesheet" href="style/app.css">
<!--       <link rel="stylesheet" href="style/normalize.css">
      <link rel="stylesheet" href="style/main.css"> -->
   </head>
   <body>
<!--          <div id="header" style="background-image: url(https://2.pik.vn/20220f75728b-1738-401b-910b-44d9034d00f4.jpg);"> </div>
			   <div class="menu">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
				</div> -->

         <div id="wrapper">

            <div id="header_">
               <div class="blog_title">
                  <a href="/simple-blog">cuzin pro</a>
               </div>
               <ul class="options">
                  <li class="option"><a href="#">facebook</a></li>
                  <li class="option"><a href="#">github</a></li>
                  <li class="option"><a href="#">youtube</a></li>
               </ul>
            </div>

            <div class="body_">
               <?php
                  try {
                     $stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
                     echo '<div class="Articles"><ul class="Articles_items">';
                        while($row = $stmt->fetch()){
                              // echo '<span class="Articles__item-date">' .date('jS M Y H:i:s', strtotime($row['postDate'])).'</span>';
                              echo '<li class="Articles__item">
                              <span class="Articles__item-date">' .date('d M Y H:i:s', strtotime($row['postDate'])).'</span>
                              <a href="viewpost.php?id='.$row['postID'].'" class="Articles__item-title">'.$row['postTitle'].'</a></li>';
                              // echo '<p>'.$row['postDesc'].'</p>';				
                              // echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';				
                        }
                     echo '</ul></div>';
                  } catch(PDOException $e) {
                     echo $e->getMessage();
                  }
                  ?>
            </div>

            <div class="blog_footer"></div>

         </div>
   </body>
</html>