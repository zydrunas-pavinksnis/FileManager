<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File viewer</title>
</head>
<body>
    <?php
        $dir = "./home/";
        $files1 = scandir($dir);
    
        // print_r($files1);      

        function showTable ($mas){
            foreach ($mas as $val) {
                GLOBAL $dir;
                $firstCol = "";
                $secondCol = "<td> $val </td>";
                $thirdCol = "";

                if ($val == "."||$val == "..") {
                    continue;
                }

                // <a href="url">$val</a>

                if (is_dir($dir . $val)) {
                    $firstCol = "<td>dir</td>";
                    $secondCol = "<td> $val </td>";
                    $thirdCol = "<td></td>";
                } elseif (is_file($dir . $val)){
                    $firstCol = "<td>file</td>";
                    $secondCol = "<td> $val </td>";
                    $thirdCol = "<td>delete, download</td>";
                } else {
                    $firstCol = "<td></td>";
                    $thirdCol = "<td></td>";
                }
                

                $row = "<tr> $firstCol $secondCol $thirdCol </tr>";
                echo $row;


            }


        }

        
    ?>

<h4>File manager</h4>

    

<table>
<tr>
    <th>type</th>
    <th>name</th>
    <th>actions</th>
</tr>
<?php showTable($files1);  ?>
</table>
    
</body>
</html>