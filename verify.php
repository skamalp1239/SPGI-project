<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cat_answer = $_POST['cat_question_answer'];

		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				if($row['status']){
					if(password_verify($password, $row['password'])){
						// check selected cat images
						$selected_cats = $_POST['cat_images'];
						$cat_images = array('1', '3', '5', '8', '9');
						if(empty(array_diff($selected_cats, $cat_images)) && empty(array_diff($cat_images, $selected_cats))) {
							if($row['cat_question_answer'] == $cat_answer){
								if($row['type']){
									$_SESSION['admin'] = $row['id'];
								}
								else{
									$_SESSION['user'] = $row['id'];
								}
							}
							else{
								$_SESSION['error'] = 'Incorrect answer to car model question.';
							}
						}
						else {
							$_SESSION['error'] = 'Please select the images that contain a cat.';
						}
					}
					else{
						$_SESSION['error'] = 'Incorrect Password';
					}
				}
				else{
					$_SESSION['error'] = 'Account not activated.';
				}
			}
			else{
				$_SESSION['error'] = 'Email not found';
			}
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Please login first';
	}

	header('location: login.php');

?>
