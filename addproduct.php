    <?php
    include 'dbConfig.php';
    if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
        if($_REQUEST['action'] == 'shtoProdukt'){
            extract($_POST);
            $file=$_FILES['file'];

            $fileName=$_FILES['file']['name'];
            $fileTmpName=$_FILES['file']['tmp_name'];
            $fileSize=$_FILES['file']['size'];
            $fileError=$_FILES['file']['error'];
            $fileType=$_FILES['file']['type'];
            
            $fileExt=explode('.',$fileName);
            $fileActualExt= strtolower(end($fileExt));
            
            $allowed= array('jpeg', 'pjpeg', 'png', 'jpg', 'gif');

            if (in_array($fileActualExt,$allowed)){
            if($fileError===0){
                if ($fileSize<20971520 ){

                 $fileNameNew=uniqid('',true).".".$fileActualExt;
                 $fileDestination ='uploads/'. $fileNameNew;
                 move_uploaded_file($fileTmpName,$fileDestination);
                 
                 $query = "INSERT INTO `produktet` (`emertimi`, `pershkrimi`,`specs`,`marka`, `cmimi`, `krijuar`, `modifikuar`, `img`) VALUES
                 ('".$emertimi."', '".$pershkrimi."','".$specs."', '".$marka."',".$cmimi.", '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."', '".$fileDestination."');";
                 $result = mysqli_query($conn,$query);
                 
                 header("Location: produktiUshtua.php");

                }else{
                    echo "File eshte shume i madh,duhet te jete me pak se 20MB !";

                }



            }else{
                echo "Nje gabim ndodhi ne upload !";


            }

            }
            else{
           echo "Ky fomrat eshte i pa suportuar!";

            }
            
           
        
        }
        }else{
            header("Location: home.php");
        }
    ?>