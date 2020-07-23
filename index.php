<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File viewer</title>
</head>
<body>

    <input type="button" value="Back" onclick="window.history.back()">
    <br><br>

    <?php    
             $path = "./home/";            
             if (isset($_GET["a"])) {
                $path = "./home/".$_GET["a"];
            }
    ?>

    <form action="" method="POST">
        <input type="text" onfocus="this.value=''" id="newdir" name="newdir" placeholder="new folder">
        <input type="hidden"  name="path" value="<?echo $path;?>">
        <input type="submit" value="submit">
    </form>

    <?php
        $files1 = scandir($path);
        sort($files1);
                       
        echo "<table>
        <tr> <th>type</th> <th>name</th> <th>actions</th> </tr>";
        foreach ($files1 as $val) {     
            if ($val === "."||$val === "..") {
                continue;
            }
            echo "<tr>";       
            if (is_dir($path.'/'.$val)) {
                $url = '?a='.$val;  
                if (isset($_GET["a"])) {
                    $url = '?a='.$_GET["a"].'/'.$val;
                }
                echo "<td>dir</td> <td><a href='".$url."'>".$val."</a> </td><td></td>";                      
            } else {
                $delFileName = $path."/".$val;
                                
                echo "<td>file</td> <td> $val </td>";
                echo '<td>
                <form action="" method="POST">
                <input type="text"  name="delPath" value="'.$delFileName.'">
                <input type="submit" value="delete">
                </form>              
                </td>';                
            }           
            echo "</tr>";
        }
        echo "</table>";

            

        if (isset($_POST['newdir'])) {
            $newDir = $_POST['path'].'/'.$_POST['newdir'];
            mkdir($newDir);
            header("Refresh:0");                      
        }

        if (isset($_POST['delPath'])) {
            $delFile = $_POST['delPath'];
            unlink($delFile);
            header("Refresh:0");                      
        }

        
        
        
    ?>



    


    
</body>
</html>