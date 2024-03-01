<?php
date_default_timezone_set('Africa/Kampala');

$conn = mysqli_connect('localhost', 'root', '', 'demo_parking');
if(!$conn){
    echo mysqli_error($conn);
}