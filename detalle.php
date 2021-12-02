<?php

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
   
    require_once "config.php";
    
   
    $sql = "SELECT * FROM estudiantes WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){
       
        $stmt->bindParam(":id", $param_id);
        
       
        $param_id = trim($_GET["id"]);
        
       
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
               
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                
                $name = $row["ID"];
                $address = $row["nombre"];
                $salary = $row["apellido"];
            } else{
                
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Lo sentimos! Algo anduvo mal. Por Favor intenta nuevamente.";
        }
    }
     
   
    unset($stmt);
    
 
    unset($pdo);
} else{
    
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Registro</h1>
                    <div class="form-group">
                        <label>ID</label>
                        <p><b><?php echo $row["ID"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <p><b><?php echo $row["nombre"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <p><b><?php echo $row["apellido"]; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>