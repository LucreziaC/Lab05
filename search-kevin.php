<?php include("top.html"); ?>

<?php
include("commons.php");
$db= new PDO("mysql:dbname=imdb;host=localhost", "root");

$name=$db->quote($_GET["firstname"]);
$surname=$db->quote($_GET["lastname"]);
$query="SELECT id FROM actors WHERE first_name=$name AND last_name=$surname";
$id_q=exist($query,$db);
//$id_q="SELECT id FROM actors WHERE first_name=$name AND last_name=$surname";

$id_kevin="SELECT id FROM actors WHERE first_name='Kevin' AND last_name='Bacon'";
$q="SELECT * FROM movies JOIN roles ON movie_id=id WHERE actor_id IN ((".$id_q. "),(". $id_kevin."))
    HAVING COUNT(name)>1;";
try{
$rows=$db->query($q);
if(empty($rows))
throw new PDOException;

?>
<h1>Results for <?=$_GET["firstname"]?> <?=$_GET["lastname"]?></h1>

<table>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Year</th>
    </tr>
    
<?php
$i=1;
foreach ($rows as $row){?>

    <tr>
        <td><?=$i++?></td>
        <td><?=$row["name"]?></td>
        <td><?=$row["year"]?></td>
    </tr>

     
<?php

}

?>
</table>
<?php
}catch(PDOException $ex){
print "Nessun valore";

}
?>

<?php include("bottom.html"); ?>
