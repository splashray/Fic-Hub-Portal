<?php 

//insert services
function insert_categories(){
    global $con;
    
    if(isset($_POST['add-services'])){
        $services_cat =$_POST['services_cat'];
        $services =$_POST['services'];
        $services_option =$_POST['services_option'];
        $services_delivery =$_POST['services_delivery'];
        $expected_bills =$_POST['expected_bills'];
        
        $post_image        = $_FILES['services_image']['name'];
        $post_image_temp   = $_FILES['services_image']['tmp_name'];

        move_uploaded_file($post_image_temp, "./images/$post_image");
    if($services_cat==""||$services==""|| $services_option=="" ||$services_delivery==""||$expected_bills==""||$post_image==""){
        echo "<script type='text/javascript'> document.location = 'services.php'; </script>";
    }else{
            $query = "INSERT INTO category(services_cat, services, services_option, services_delivery, expected_bills, services_image ) " ;
            $query.= "VALUE('{$services_cat}','{$services}','{$services_option}','{$services_delivery}','{$expected_bills}','{$post_image}' ) " ;
        
            $create_category_query = mysqli_query($con, $query);
        
                    if(!$create_category_query){
                        die('QUERY FAILED'.mysqli_error($con));
                    }
                    echo "<script type='text/javascript'> document.location = 'services.php'; </script>";
        }   

} 
    
    } 


    //Delete categories
function deleteCategories(){
    global $con;
    
        if(isset($_GET['delete'])){
            $the_services_id = $_GET['delete'];
        
            $query = "DELETE FROM category WHERE services_id = {$the_services_id}";
            $delete_query = mysqli_query($con, $query);
            echo "<script type='text/javascript'> document.location = 'services.php'; </script>";
        }
    
    
    }


?>