<?php

ob_start();
?>
<!doctype html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <title><?= TITLE; ?></title>
        
        <style type="text/css">
            <?php 
            if($data['paper'] != 'A4'){
                echo '@page { size: 80mm  potrait;}';
                $font_size = '5px';    
            }else{
                $font_size = 'x-small';
            }
            ?>

            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table{
                font-size: <?= $font_size; ?>;
            }
            tfoot tr td{
                font-weight: bold;
                font-size: <?= $font_size; ?>;
            }
            .gray {
                background-color: lightgray
            }
        </style>
        
        </head>