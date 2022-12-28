<?php require"connection.php";   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="container">
        <form name="formAdd" action="" method="POST" class="formulaire" enctype="multipart/form-data">
            <h2 align="center">Ajouter une Nouvelle Voiture</h2>
            <label id="label"><br>immatriculation:</br></label>
            <input type="text" name="txtima" class="zonetexte" placeholder="Entrer un Immatriculation" required>
             <label><br>Marque:</br></label>
            <input type="text" name="txtimarque" class="zonetexte" placeholder="Entrer une Marque" required>
             <label><br>Prix de location:</br></label>
            <input type="text" name="txtpl" class="zonetexte" placeholder="Entrer le Prix Unitaire" required>
             <label><br>Photo:</br></label>
            <input type="file" name="txtphoto" class="zonetexte" placeholder="Entrer une Image" required>
            <input type="submit" name="btnadd" value="Ajouter" id="submit">
            <p><a href="#" class="submit">Tableau de bord</p>
        </form>
        <?php      
        if(isset($_POST['btnadd']))
        {
            $imm = $_POST['txtima'];
            $marque  = $_POST['txtmarque'];
            $prixloc = $_POST['txtpl'];
            $images = $_FILES['txtphoto']['tmp_name'];
            $traget ="images/".$_FILES['txtphoto']['name'];

            move_uploaded_file($images, $traget);
            $traitement = "INSERT INTO automobile (imatriculation,marque,prix,photo) VALUES($txtima,$txtmarque,$txtpl,$traget)";
            $query_run = $con->prepare($traitement);
            $data = [':imatriculation' => $txtima,
                        ':marque' => $txtmarque,
                        ':prix'=> $txtpl,
                        ':photo'=> $traget
        ];
        $query_execute = $query_run->execute($data);
        if($query_execute)
        {
            
        }
        }
        ?>
        
    </div>
    
</body>
</html>