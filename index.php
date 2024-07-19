<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#inicializar una nueva sesion de cURl; ch = CURL handle
$ch = curl_init(API_URL);
//Indicar que queremos recibir el resultado de la peticion y no mostrarla eb pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/*Ejecutar la peticion
y guardar el resultado
*/
$result = curl_exec($ch);

//una alternative seria utilizar file_get_contents
// $result = file_get_contents(API_URL); // si solo quieres hacer un GET de una API
$data = json_decode($result, true);

curl_close($ch);
// var_dump($data);
?>
<head>
    <title>La proxima pelicula de Marvel</title>
    <meta name="description" content="La proxima pelicula de Marvel"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/pico.min.css" />
    <link rel="icon" type="image/x-icon" href="icons8-star.gif">
</head>
<main>
    <h1>La proxima película de Marvel</h1>
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?=$data["poster_url"]; ?>"
        />
    </section>
    <hgroup>
        <h2><?= $data["title"]; ?> se estrena en <?= $data["days_until"];?> dias</h2>
        <p>Fecha de estreno: <?= $data["release_date"];?> </p>
        <p>La siguiente pelicula es: <span><?= $data["following_production"]["title"];?> </span></p>
    </hgroup>
</main>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Imprima&display=swap');
    :root {
        background-image: url("colorkit.png");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    body{
        display: grid;
        place-content: center;
    }
    h1{
        text-align: center;
        font-family: "Fira Sans", sans-serif;
        font-size: 60px;
        font-style: italic;
        color: transparent;
        background: rgba(0, 0, 0, 0.8);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
        text-shadow: 1px 3px 3px rgba(255, 255, 255, 0.3);
    }
    img{
        border-radius: 101px 51px 101px 51px;
        -webkit-border-radius: 101px 51px 101px 51px;
        -moz-border-radius: 101px 51px 101px 51px;
        border: 10px solid #ffd700;
    }
    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }
    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        h2{
            font-family: "Fira Sans", sans-serif;
            font-size: 28px;
            text-shadow: 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black, 2px 0px 0 black, 0px 2px 0 black, -2px 0px 0 black, 0px -2px 0 black;
            color: gold;
            font-style: italic;
        }
        p{
            font-family: "Rubik", sans-serif;
            font-size: 24px;
            font-weight: 800;
            color: transparent;
            background: rgb(0, 0, 0);
            -webkit-background-clip: text;
            -moz-background-clip: text;
            background-clip: text;
            text-shadow: 1px 3px 3px rgba(255, 255, 255, 0.3);
        }
        span{
            font-family: "Fira Sans", sans-serif;
            font-size: 24px;
            font-weight: 100;
            text-shadow: 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black, 2px 0px 0 black, 0px 2px 0 black, -2px 0px 0 black, 0px -2px 0 black;
            color: gold;

        }
    }
</style>


