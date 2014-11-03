<?php 
include 'core/init.php';
protect_page();
include 'includes/overall/overallheader.php' ;
require 'ProfileGallery.php';
$gallery = new ProfileGallery();
$gallery->setPath('./images/profile/'); 
$limits = [10,25,50,100,500,1000]; 
$limit = get_show_input($session_user_id);
if(empty($limit)) {	user_show_input($session_user_id,50 );} 
?>


<script>
function change(){
    document.getElementById("num-users-form").submit();

  }
</script>


<?php
if(isset($_POST['users-id'])) {
	$limit = (int) $_POST['users-id'];
	user_show_input($session_user_id,$limit );
	$limit = get_show_input($session_user_id);

	unset($limits[array_search($limit,$limits)]); 
	array_unshift($limits, $limit);

		
	
	} else {
	user_show_input($session_user_id,50 );
	$limit = get_show_input($session_user_id);
	
	
	
	
} 



$user_profiles = get_active_users($limit); 
//print_r($user_profiles);

$pics = array();
$names = array();


foreach($user_profiles as $p){
		$pics[] = $p[0];
		$names[] = $p[1];

}

//print_r($pics);




$images = $gallery->getImages(array('jpg','png','jpeg','gif'), $pics); 

?> 


<h1> User Pages </h1>
<p> GrubNums has <?php echo get_total_active_users();  ?> active Users </p>


<form id="num-users-form" method="post">
Users Shown:  <select name = 'users-id' onchange="change()" width="80" style="width: 80px" >
	

		<?php
		for($i=0; $i<count($limits); $i++){
			echo '<option>'.$limits[$i].'</option>' ;
			}	
					
		?>

	
</select>

<?php echo $limit;?>

</form> 

<div id="users_container_gallery">
			<?php if($images): ?>
			<div class="gallery cf">

				<?php  for($i=0; $i< count($user_profiles) ; $i++) {  ?>
				
				<div class="gallery-item">
				<div class="profile-gallery-name" > <?php  echo $names[$i]  ?></div>
					<a href="<?php  echo $names[$i]  ?> " ><img src= "<?php echo './images/profile/thumbs/'.$pics[$i]   ?>" > </a> 
				</div>
					
				<?php } ?>
				
			
				
				
			

				
			
				
			
				
			</div>
			<?php else: ?>
				There are no images
			<?php endif; ?>
		</div>



<?php






?>


















<?php include 'includes/overall/overallfooter.php'; ?> 

