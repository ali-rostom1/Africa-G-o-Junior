<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/output.css">
    <link rel="stylesheet" href="../css/input.css">
    <title>edit</title>
</head>
<body class="flex justify-center items-center min-h-screen bg-slate-500">
    <?php
        include "dbConn.php";
        if(isset($_GET["id_country"])){
            $id_country = $_GET["id_country"];
            $sql = "SELECT * FROM country WHERE id_country=$id_country";
            $res = $mysqli->query($sql);
            $res = $res->fetch_assoc();
            echo '<form class="space-y-4 font-[sans-serif] max-w-md mx-auto bg-slate-300 py-10 px-10" action="">
            <span class="font-bold text-xl"> Edit Country</span>
        <input type="text" placeholder="name" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="name" value="'.$res["name"].'"/>
        <input type="text" placeholder="population" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="pop" value="'.$res["pop"].'" />
        <input type="text" name="lang" placeholder="languages" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" value="'.$res["lang"].'"/>
        <button type="button" class="!mt-8 w-full px-4 py-2.5 mx-auto block text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
    </form>';
        }
    ?>
    
</body>
</html>