<?php require('includes/config.php'); 
   $stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate FROM blog_posts WHERE postID = :postID');
   $stmt->execute(array(':postID' => $_GET['id']));
   $row = $stmt->fetch();
   
   //if post does not exists redirect user.
   if($row['postID'] == ''){
   	header('Location: ./');
   	exit;
   }
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8">
      <title>Blog - <?php echo $row['postTitle'];?></title>
      <!-- <link rel="stylesheet" href="style/normalize.css"> -->
      <link rel="stylesheet" href="style/app.css">
   </head>
   <body>
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
               echo '<div class="Article">';
               	echo '<div class="Article__header"><h1 class="Article__title">'.$row['postTitle'].'</h1>';
               	echo '<div class="Article__details"><span class="Article__date">Posted on '.date('jS M Y', strtotime($row['postDate'])).'</span></div></div>';
               	echo '<p>'.$row['postCont'].'</p>';				
               echo '</div>';
               ?>
         </div>

				 <div class="Article__footer">
						<a href="#">
							<div class="Article__reply">Copyright</div>
						</a>
				 </div>

				 <div class="blog_footer"></div>
				 
      </div>
   </body>
</html>