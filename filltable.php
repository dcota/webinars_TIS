<?php
    
    require_once('connectdb.php');

    $stmt = $connection->prepare("SELECT * FROM aluno");
    $stmt->execute();
    $stmt->bind_result($id, $pn, $un, $mor, $dn, $tel, $gen);
    while ($stmt->fetch()) {
        echo '<tr>
                <td>'.$id.'</td>
                <td>'.$pn.' '.$un.'</td>
                <td>'.$mor.'</td>
                <td>'.$dn.'</td>
                <td>'.$tel.'</td>
                <td>'.$gen .'</td>
                </tr>';
    }

?>