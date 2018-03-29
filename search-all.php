<?php include("top.html"); ?>

<?php

$db= new PDO("mysql:dbname=imdb;host=localhost", "root");
$name=$db->quote($_GET["firstname"]);
$surname=$db->quote($_GET["lastname"]);

$q="SELECT name,year FROM movies
    JOIN roles ON movies.id=roles.movie_id 
    JOIN actors ON actors.id=roles.actor_id 
    WHERE actors.first_name=$name AND actors.last_name=$surname ORDER BY year DESC, name ASC";
$rows=$db->query($q);

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

<?php include("bottom.html"); ?>
