<?php require_once('inc/dbconnection.php'); ?>
<?php 
	$user_list = '';
	$search = '';
	$query = "SELECT * FROM lecturers ORDER BY index_no";
	$users = mysqli_query($connection, $query);
	while ($user = mysqli_fetch_assoc($users)) {
		//getting each lecturer's data from lecturer database
		$index_no = $user['index_no'];
    	$title = $user['title'];
    	$post = $user['post'];
    	$degree = $user['degree'];
		//second query to get each lecturer's data which are not in the lecturer database but in the user database 
	 	$query = "SELECT * FROM user WHERE index_no = '{$index_no}' LIMIT 1";
    	$results = mysqli_query($connection, $query);
    	$result = mysqli_fetch_assoc($results);

		$first_name = $result['first_name'];
		$last_name = $result['last_name'];
		$profile_picture_dir = $result['profile_picture_dir'];
		$email = $result['email'];
		$user_list .= "<div id=login-container>";

		if(file_exists("profile-pictures/" . "{$profile_picture_dir}")){
			$user_list .= "<div class=profile-img><img src=profile-pictures/" . "{$profile_picture_dir} alt={$first_name} width=\"200\" height=\"220\" class=photo><br></div>";
		}
		else{
			$user_list .= "<div class='profile-img' style='background:url('img/empty-pp.png');'></div>";
		}
		$user_list .= "<div class=post>" . $post . "</div><br>" ;
		$user_list .= "<h1>" . $title . "." . $first_name . " " . $last_name ."  </h1><br>";
		$user_list .= "<div class='description'>".$degree . "<br>";
		$user_list .= "email:  ";
		$user_list .= $email . "</div>
								<br>";
		$user_list .= "<footer>
						
						</footer>
						</div>";
	}


























	
// 	<div id="login-container">
//   <div class="profile-img"></div>
//   <h1>
//     Maddie
//   </h1>
//   <div class="description">
//     Maddie is a front end web developer in New York. She has worked in the field for 10 years now. Check out her projects in the links below. She is available for hire as well.
//   </div>
//   <div class="social">
//     <a>GitHub</a>
//     <a>Twitter</a>
//     <a>LinkedIn</a>
//   </div>
//   <button>Hire Me</button>
//   <footer>
//     <div class="likes">
//       <p><i class='fa fa-heart'></i></p>
//       <p>1.5K</p>
//     </div>
//     <div class="projects">
//       <p>Projects</p>
//       <p>154</p>
//     </div>
//   </footer>
// </div>

 ?>