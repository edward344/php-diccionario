<?php

if (isset($_GET["word"]))
{
    include 'ingles-espanol.php';

    $dict = new Dictionary();

    $def_array = $dict->find($_GET["word"]);

    $dict->close();
}

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<title> Diccionario Inglés Español </title>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="w3.css">
    
    <style>
        .form-container {
            width: 30%;
            margin: 100px auto;
        }
        
        .def-container {
            width: 45%;
            margin: auto;
        }
    </style>
    
</head>
<body>

<h1 class="w3-center">Diccionario Inglés Español</h1>

<form class="form-container" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
    <input type="text" class="w3-input w3-border w3-section" name="word" placeholder="Inglés">
    <button type="submit" class="w3-button w3-block w3-deep-orange">Search</button>
</form>

<div class="def-container">
    <table class="w3-table w3-striped w3-border">
        <tr>
            <th>English</th>
            <th>Spanish</th>
            <th>Tag</th>
            <th>Pronunciation</th>
        </tr>
        <?php
        if (isset($def_array))
        {
            foreach ($def_array as $def)
            {
                echo '<tr>';
                    echo '<td>' . $def["english"] . '</td>';
                    echo '<td>' . utf8_encode($def["spanish"]) . '</td>';
                    echo '<td>' . $def["tag"] . '</td>';
                    echo '<td>' . utf8_encode($def["pronunciation"]) . '</td>';
                echo '</tr>';
            }
        }
        ?>
    </table>
</div>

</body>
</html>