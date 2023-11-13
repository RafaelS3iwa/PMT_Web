<?php 

if(isset($_SESSION['sucesso'])){
    echo '<div class="alert alert-success" role="alert">';
    echo $_SESSION['sucesso']; 
    echo '</div>';
    unset($_SESSION['sucesso']);
}

if(isset($_SESSION['erro'])){
    echo '<div class="alert alert-danger" role="alert">';
    echo $_SESSION['erro']; 
    echo '</div>';
    unset($_SESSION['erro']);
}