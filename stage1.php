<html>
<Title> Wiki Api2</Title>
<body>
<form action="stage.php" method="post">
    Search the wiki: <input type="text" name="name">
</form>
<div class="w3-container">


    <?php

    print_r($_POST);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://en.wikipedia.org/w/api.php?action=query&format=json&list=search&srsearch=.('$_POST').");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($ch);

    curl_close($ch);

    $var = json_decode($output);

    $results = $var->query->search;


    foreach ($results as $result) {

        echo '<br>';
        echo'<b>'.$result->title.'</b>';

        echo '<br>';
        echo '<br>';
        echo ($result->snippet);
        echo '<br>';
        echo '<br>';
        echo ($result->timestamp);
        echo '<br>';
        echo '<br>';

    }

    ?>

</div>
</body>
</html>
<style>
    body{
        background-color: darkgreen;
        text-align:left;

    }
    .w3-container{
        background-color: white;
    }

</style>