<?php

function exist($s, $db){
    $new_rows=$db->query($s);
    foreach($new_rows as $row){
            if($row['id']==0){?>

<h1>Actor not found</h1>   
<?php
            }else 
        return $s;

    }
    
}


?>