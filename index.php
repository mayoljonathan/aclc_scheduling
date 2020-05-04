<?php require_once 'library/config.php'; ?>
<?php 
	if(!isset($_SESSION['user']['loggedIn'])):
		header("Location:login");
	endif;

	// session_destroy();
?>


<?php 
	extract($_REQUEST);
	$page = (isset($page) ? $page : '');

	switch ($page) {
		case 'main':
			require_once 'view/main/index.php';
		break;

		default:
			require_once 'view/main/index.php';
		break;
		}

?>

