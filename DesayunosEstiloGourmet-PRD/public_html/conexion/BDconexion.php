<?php

//1.string de conexion local
//$conn = mysqli_connect("localhost", "root","", "dev_desayunosgourmet");

//2.string de conexione en qa
//$conn = mysqli_connect("10.128.0.2", "desayuno","5Fe7L!yUe06#zT","desayuno_qa");

//3.string de conexion en produccion
$conn = mysqli_connect("10.128.0.2", "desayuno","5Fe7L!yUe06#zT","desayuno_prd");
