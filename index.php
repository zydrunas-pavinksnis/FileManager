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
                $secondCol = "";
                $thirdCol = "";

                if ($val == "."||$val == "..") {
                    continue;
                }

                // <a href="url">$val</a>

    //             <form action="index.php" method="POST">
    //     <label for="height">Ugis (centimetrais):</label><br>
    //     <input type="number" id="height" name="height"><br>
    //     <label for="weight">Svoris (kg):</label><br>
    //     <input type="number" id="weight" name="weight"><br>
    //     <br>
    //     <!-- <input type="radio" id="vyras" name="lytis" value="vyras">
    //     <label for="vyras">Vyras</label><br>
    //     <input type="radio" id="moteris" name="lytis" value="moteris">
    //     <label for="moteris">Moteris</label><br>
    //     <br> -->
    //     <input type="submit" value="Ivesti">
    // </form>

                if (is_dir($dir . $val)) {
                    $firstCol = "<td>dir</td>";
                    $secondCol = "<td>

                    <form action='index.php' method='POST'>

                    <label for='fname'>First name:</label><br>

                    <input type='submit' value='$val'>

                    </form>
                    
                    <!-- <a href=$dir".$val.">$val</a> -->
                     </td>";
                    $thirdCol = "<td></td>";
                } elseif (is_file($dir . $val)){
                    $firstCol = "<td>file</td>";
                    $secondCol = "<td> $val </td>";
                    $thirdCol = "<td>delete, download</td>";
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

<!-- jhgjg -->
    
</body>
</html>