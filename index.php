<!-- <!DOCTYPE html>
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
    <form method="post" enctype="multipart/form-data">
        Nama <input type="text" name="name"><br><br>
        Email <input type="email" name="email"><br><br>
        Divisi <input type="text" name="division"><br><br>
        <input type="submit" name="submit" value="Submit"> <input type="submit" name="loadData" value="Load Data"> <input type="reset">
    </form>

<?php

    // $host = "serverdicoding.database.windows.net";
    // $admin = "aderesie";
    // $pass = "Corazon123";
    // $db   = "submission";

    // try {
    //     $connectionInfo = array("UID"=> "aderesie@serverdicoding","pdw"=> $pass, "Database"=> $db, "LoginTimeout"=> 30, "Encrypt"=> 1, "TrustServerCertificate"=> 0);
    //     $serverName = "tcp:serverdicoding.database.windows.net,1433";
    //     $conn = sqlsrv_connect($serverName, $connectionInfo);
    //     if (isset($_POST['submit'])) {
    //         try{
    //             $name = $_POST['name'];
    //             $email = $_POST['email'];
    //             $division = $_POST['division'];
    //             $date = date("Y-m-d");
    
    //             $sql_insert = "INSERT INTO user ( name, division, email, date) value (?,?,?,?)";
    //             $stmt = $conn->prepare($sql_insert);
    //             $stmt->bindValue(1,$name);
    //             $stmt->bindValue(2, $division);
    //             $stmt->bindValue(3, $email);
    //             $stmt->bindValue(4, $date);
    //             $stmt->execute();
    
    //             echo "<h1>Selamat Kamu Telah Mendaftar di Lab Chevalier</h1>";
    //         } catch(Exception $e){
    //             echo "Failed: ".$e;
    //         }
    //     } else if (isset($_POST['loadData'])) {
    //         try {
    //             $sql_select = "SELECT * FROM [dbo].[user]";
    //             $stmt = $conn->query($sql_select);
    //             $registrans = $stmt->fetchAll();
                
    //             if (count($registrans) > 0) {
    //                 echo "<h1>Orang Yang Telah Mendaftar di Chevalier Lab</h1>";
    //                 echo "<table>";
    //                 echo "<tr>";
    //                 echo "<th>Nama</th>";
    //                 echo "<th>Divisi</th>";
    //                 echo "<th>Email</th>";
    //                 echo "<th>Date</th>";
    //                 echo "</tr>";
    //                 foreach($registrans as $value){
    //                     echo "<tr>";
    //                     echo "<td>".$value['name']."</td>";
    //                     echo "<td>".$value['division']."</td>";
    //                     echo "<td>".$value['email']."</td>";
    //                     echo "<td>".$value['date']."</td>";
    //                     echo "</tr>";
    //                 }
    //                 echo "</table>";
    //             } else {
    //                 echo "<h1>Belum Ada Yang Mendaftar di Lab Chevalier</h1>";
    //             }
    //         } catch(Exception $e){
    //             echo "Failed: ".$e;
    //         }
    //     }
    // } catch(Exception $e) {
    //     echo "Failed: " . $e;
    // }
    

?>
    
</body>
</html> -->
<html>
 <head>
 <Title>Registration Form</Title>
 <style type="text/css">
 	body { background-color: #fff; border-top: solid 10px #000;
 	    color: #333; font-size: .85em; margin: 20; padding: 20;
 	    font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
 	}
 	h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
 	h1 { font-size: 2em; }
 	h2 { font-size: 1.75em; }
 	h3 { font-size: 1.2em; }
 	table { margin-top: 0.75em; }
 	th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
 	td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
 </style>
 </head>
 <body>
 <h1>Register here!</h1>
 <p>Fill in your name and email address, then click <strong>Submit</strong> to register.</p>
 <form method="post" action="index.php" enctype="multipart/form-data" >
       Name  <input type="text" name="name" id="name"/></br></br>
       Email <input type="text" name="email" id="email"/></br></br>
       Job <input type="text" name="job" id="job"/></br></br>
       <input type="submit" name="submit" value="Submit" />
       <input type="submit" name="load_data" value="Load Data" />
 </form>
 <?php
    $host = "serverdicoding.database.windows.net";
    $user = "aderesie";
    $pass = "Corazon123";
    $db = "submission";
    try {
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }
    if (isset($_POST['submit'])) {
        try {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $job = $_POST['job'];
            $date = date("Y-m-d");
            // Insert data
            $sql_insert = "INSERT INTO Registration (name, email, division, date) 
                        VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $job);
            $stmt->bindValue(4, $date);
            $stmt->execute();
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
        echo "<h3>Your're registered!</h3>";
    } else if (isset($_POST['load_data'])) {
        try {
            $sql_select = "SELECT * FROM user";
            $stmt = $conn->query($sql_select);
            $registrants = $stmt->fetchAll(); 
            if(count($registrants) > 0) {
                echo "<h2>People who are registered:</h2>";
                echo "<table>";
                echo "<tr><th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>Job</th>";
                echo "<th>Date</th></tr>";
                foreach($registrants as $registrant) {
                    echo "<tr><td>".$registrant['name']."</td>";
                    echo "<td>".$registrant['email']."</td>";
                    echo "<td>".$registrant['job']."</td>";
                    echo "<td>".$registrant['date']."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<h3>No one is currently registered.</h3>";
            }
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
    }
 ?>
 </body>
 </html