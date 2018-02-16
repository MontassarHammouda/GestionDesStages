<?php 
require_once 'verifier_access.php';
require_once '../classes/Entreprise.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
 
    
    <link rel="stylesheet" href="assets/css/linea.min.css">
    <link rel="stylesheet" href="assets/css/nas.min.css?v=2">
        <div class="container">
        <div class="row center">
            <div class="col s12">
                <h2 class="white-text">Message us</h2>
            </div>
        </div>
        <form id="mail-form" action="mailer/mailer.php" novalidate autocomplete="off">
            <div class="row">
                <div class="col s12 l6">
                    <div class="input-field">
                        <input id="name" type="text" name="name">
                        <label for="name">Name</label>
                    </div>
                </div>
                <div class="col s12 l6">
                    <div class="input-field">
                        <input id="email" type="email" name="email">
                        <label for="email">Email</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <textarea class="materialize-textarea" id="message" name="message"></textarea>
                        <label for="message">Message</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 center">
                    <button class="btn btn-large btn-flat waves-effect waves-dark white-text" id="send-message" type="submit">Send</button>
                </div>
            </div>
        </form>
    </div>
    
    </body>

    </html>

