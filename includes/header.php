

    <header>


    	<h1><a href="index.php">Grub <span>Nums</span> </a></h1>

    </header>
    
   	<?php 
   	
 if( logged_in() === true ) {  
   	
 include 'includes/nav_normal.php';  
	
	} else{
	
	include 'includes/nav_new_user.php';  
	
	
}
   	
   	
   	?>