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
        //edit country form
        if(isset($_GET["id_country"]) && !isset($_GET["id_city"]) && !isset($_GET["add"])){
            $id_country = $_GET["id_country"];
            $sql = "SELECT * FROM country WHERE id_country=$id_country";
            $res = $mysqli->query($sql);
            $res = $res->fetch_assoc();
            echo '<form id="countryForm" class="space-y-4 font-[sans-serif] max-w-md mx-auto bg-slate-300 py-10 px-10" action="edit.php?id_country='.$id_country.'&name='.$res["name"].'" method="POST">
            <span class="font-bold text-xl"> Edit Country</span>';
            if(isset($_GET["error"])) echo '<br><span class="text-md text-red-500">'.urldecode($_GET["error"]).'</span>';
            echo '<input type="text" placeholder="name" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="name" value="'.$res["name"].'" required/>
        <input type="text" placeholder="population" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="pop" value="'.$res["pop"].'" required/>
        <input type="text" name="lang" placeholder="languages" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" value="'.$res["lang"].'" required/>
        <button type="submit" class="!mt-8 w-full px-4 py-2.5 mx-auto block text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
    </form>';
        }
        //edit city form
        if(isset($_GET["id_country"]) && isset($_GET["id_city"]) && !isset($_GET["add"])){
            $id_country = $_GET["id_country"];
            $id_city = $_GET["id_city"];
            $sql = "SELECT * FROM city WHERE id_city=$id_city";
            $res = $mysqli->query($sql);
            $res = $res->fetch_assoc();
            echo '<form id="cityForm" class="space-y-4 font-[sans-serif] max-w-md mx-auto bg-slate-300 py-10 px-10" action="edit.php?id_country='.$id_country.'&id_city='.$id_city.'&name='.$res["name"].'" method="POST">
                    <span class="font-bold text-xl"> Edit City</span>';
            if(isset($_GET["error"])) echo '<br><span class="text-md text-red-500">'.urldecode($_GET["error"]).'</span>';
            echo '<input type="text" placeholder="name" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="name" value="'.$res["name"].'" required/>
                <input type="text" placeholder="type" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="type" value="'.$res["type"].'" required/>
                <button type="submit" class="!mt-8 w-full px-4 py-2.5 mx-auto block text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
            </form>';
        }
        //add country form
        if(isset($_GET["add"]) && isset($_GET["id_continent"])){
            echo '<form id="addCountryForm" class="space-y-4 font-[sans-serif] max-w-md mx-auto bg-slate-300 py-10 px-10" action="add.php?id_continent='.$_GET["id_continent"].'" method="POST">
            <span class="font-bold text-xl"> Add country</span>';

            if(isset($_GET["error"])) echo '<br><span class="text-md text-red-500">'.urldecode($_GET["error"]).'</span>';

            echo'
        <input type="text" placeholder="name" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="name" required/>
        <input type="text" placeholder="population" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="pop" required/>
        <input type="text" name="lang" placeholder="languages" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" required/>
        <button type="submit" class="!mt-8 w-full px-4 py-2.5 mx-auto block text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
    </form>';
        }
            
        //add city form
        if(isset($_GET["add"]) && isset($_GET["id_country"])){
            echo '<form id="addCityForm" class="space-y-4 font-[sans-serif] max-w-md mx-auto bg-slate-300 py-10 px-10" action="add.php?id_country='.$_GET["id_country"].'" method="POST">
            <span class="font-bold text-xl"> Add city</span>';
            if(isset($_GET["error"])) echo '<br><span class="text-md text-red-500">'.urldecode($_GET["error"]).'</span>';
            echo '<input type="text" placeholder="name" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="name" required/>
        <input type="text" placeholder="type" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="type" required/>
        <button type="submit" class="!mt-8 w-full px-4 py-2.5 mx-auto block text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
    </form>';
        }
    ?>
    <script src="../js/form.js"></script>
</body>
</html>