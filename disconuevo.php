<!DOCTYPE html>
<?php

//hi github
//added anotha one!
$titulo=$discografica=$precio=$formato=$fLanzamiento=$fCompra=$precio="";
$tituloMal=$discograficaMal=$PrecioMal="";
$dsn="";
$dbname="discografia";
$user="discografia";
$password="123";
$dbh ="";

if($_POST){
 $estaMal=false;
    //comprobacion Titulo
    if(empty($_POST['titulo'])){
        $tituloMal="El titulo esta vacio*";
        $estaMal=true;
    }else {
        $titulo=$_POST['titulo'];

    }
    $titulo=$_POST['titulo'];
    $longitud = strlen($titulo);
    for($i=0;$i<$longitud;$i++){
        if(is_numeric($titulo[$i])==true){
            $estaMal=true;
            $tituloMal="El titulo no puede contener numeros.. *";
        }else {
            $titulo=$_POST['titulo'];
        }
    }
    if(empty($_POST['discografica'])){
        $discograficaMal="El campo discografica esta vacio*";
        $estaMal=true;
    }else {
        $discografica=$_POST['discografica'];

    }
    $discografica=$_POST['discografica'];
    $longitud = strlen($discografica);
    for($i=0;$i<$longitud;$i++){
        if(is_numeric($discografica[$i])==true){
            $estaMal=true;
            $discograficaMal="La discografica no puede contener numeros.. *";
        }else {
            $discografica=$_POST['discografica'];
        }
    }
    if(empty($_POST['precio'])){
        $precioMal="El precio esta vacio*";
        $estaMal=true;
    }else {
        $precio=$_POST['precio'];

    }
    $precio=$_POST['precio'];
        if(is_string($precio)==true){
            $estaMal=true;
            $precioMal="El nombre no puede contener letras.. *";
        }else {
            $precio=$_POST['precio'];
        }
     
        print_r("<br>PASA POR AQUI");
        
    if($estaMal==false){
        print_r("pasa");
        try{
            $dsn="mysql:host localhost;dbname=$dbname";
            $dbh=new PDO($dsn,$user,$password);
            $titulo=$_POST['titulo'];
            $discografica=$_POST['discografica'];
            $formato=$_POST['formato'];
            $fLanzamiento=$_POST['FLanzamiento'];
            $fCompra=$_POST['FCompra'];
            $precio=$_POST['precio'];
            print_r($titulo);
             print_r($discografica);
             print_r($formato);
            print_r($fLanzamiento);
             print_r($fCompra);
             print_r($precio);
            $sql = $dbh->exec("INSERT INTO album (titulo,discografia,formato,fechaLanzamiento,fechaCompra,precioNumerico) VALUES (".$titulo.",". $discografica.",".$formato.",".$fLanzamiento.",".$fCompra.",".$precio.")");
             echo "Se han insertado" .$sql. "registros";
        }catch(PDOException $e){
            echo $e ->getMessage();
        }
 
    }else{
        echo "hay algo mal por sure";
    }
   
        
}

    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Disconuevo</title>
   
</head>
<body>
   <h1>Disco Nuevo</h1>
    <form action="#" method="post">
      <label>Titulo : </label><input type="text" name="titulo" value="<?php echo $tituloMal?>"><br/>  
    <label>Discografica :</label><input type="text" name="discografica" value="<?php echo $discograficaMal?>"><br>
        <label >Formato :</label><select name="formato">
            <option value="vinilo">vinilo</option>
            <option value="cd">cd</option>
            <option value="dvd">dvd</option>
            <option value="mp3">mp3</option>
        </select><br>
        <label >Fecha de lanzamiento :</label><input type="date" name="FLanzamiento" ><br>
        <label>Fecha de la compra :</label><input type="date" name="FCompra"><br>
        <label >Precio : </label><input type="number"  step="0.1" name="precio" value="<?php echo $precioMal ?>"><br>
        
        <input type="submit" value="insertar disco">
    </form>
</body>
</html>
