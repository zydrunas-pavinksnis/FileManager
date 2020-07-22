<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File viewer</title>
</head>
<body>

<input type="button" value="Back" onclick="window.history.back()">

    <?php
        
        if (isset($_GET["a"])) {
            $path = "./home/".$_GET["a"];
        } else {
            $path = "./home/";
        }

        $files1 = scandir($path);
    
                
        echo "<table>
        <tr>
            <th>type</th>
            <th>name</th>
            <th>actions</th>
        </tr>";

        foreach ($files1 as $val) {            

            if ($val === "."||$val === "..") {
                continue;
            }
            echo "<tr>";
            

            if (is_dir($path.'/'.$val)) {

            if (isset($_GET["a"])) {
                $url = '?a='.$_GET["a"].'/'.$val;
            } else {
                $url = '?a='.$val;
            }

            echo "<td>dir</td>
            <td><a href='".$url."'>".$val."</a></td>
            <td></td>";
                      
            } else {
                echo "<td>file</td>
                <td> $val </td>
                <td>delete, download</td>";                
            }           
            echo "</tr>";
        }
        echo "</table>"; 
    ?>



    


    
</body>
</html>