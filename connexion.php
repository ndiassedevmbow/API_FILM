<?php
// CONNECTION A LA BASE DE DONNEE
function conn()
{
    return new PDO("mysql:host=localhost; dbname=film_api", "root", "");
}

?>