<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Lab Chevalier</title>
    <style type="text/css">
        body {
            padding-left : 2%;
        }
    </style>
</head>
<body>

    <h1>Form Register Anggota Lab Chevalier <br>Telkom University</h1>
    <p>Tolong isi form pendaftaran dengan serius dan teliti!</p>
    <form action ="" method="post" enctype="multipart/form-data">
        Nama <input type="text" name="name"><br><br>
        Email <input type="email" name="email"><br><br>
        Divisi <input type="text" name="division"><br><br>
        <input type="submit" name="submit" value="Submit"> <input type="submit" name="loadData" value="Load Data"> <input type="reset">
    </form>

<?php

    $host = "tcp:serverdicoding.database.windows.net,1433";
    $admin = "aderesie";
    $pass = "Corazon123";
    $db   = "submission";

    
    try{
       $conn = new PDO("sqlsrv:server = $host; Database = $db", $admin, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch (Exception $e){
        echo "Failed: ".$e;
    }

    if (isset($_POST['submit'])) {
        try{
            $name = $_POST['name'];
            $email = $_POST['email'];
            $division = $_POST['division'];
            $date = date("Y-m-d");

            //$sql_insert = "INSERT INTO user ('name','division','email','date') VALUES (?,?,?,?)";
            //$sql_insert = "INSERT INTO user (name,division,email,date) VALUES ('$name','$division','$email','$date')"; 
            $sql_select = "SELECT * FROM user";
            $stmt = $conn->prepare($sql_insert);
            // $stmt->bindValue(1, $name);
            // $stmt->bindValue(2, $division);
            // $stmt->bindValue(3, $email);
            // $stmt->bindValue(4, $date);
            $data = $stmt->execute();
            var_dump($data);
            
        } catch(Exception $e){
            echo "Failed: ".$e;
        }
        echo "<h1>Selamat Kamu Telah Mendaftar di Lab Chevalier</h1>";
    } else if (isset($_POST['loadData'])) {
        try {
            $sql_select = "SELECT * FROM [dbo].[user]";
            $stmt = $conn->query($sql_select);
            
            $registrans = $stmt->fetchAll();
            
            if (count($registrans) > 0) {
                echo "<h1>Orang Yang Telah Mendaftar di Chevalier Lab</h1>";
                echo "<table>";
                echo "<tr>";
                echo "<th>Nama</th>";
                echo "<th>Divisi</th>";
                echo "<th>Email</th>";
                echo "<th>Date</th>";
                echo "</tr>";
                foreach($registrans as $value){
                    echo "<tr>";
                    echo "<td>".$value['name']."</td>";
                    echo "<td>".$value['division']."</td>";
                    echo "<td>".$value['email']."</td>";
                    echo "<td>".$value['date']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<h1>Belum Ada Yang Mendaftar di Lab Chevalier</h1>";
            }
        } catch(Exception $e){
            echo "Failed: ".$e;
        }
    }


?>
    
</body>
</html>