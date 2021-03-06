<?php

# FUNCTIONS
#
# This file contains some miscellaneous functions.

function getContextRoot()
{
    return '/web-serv-cms-project-1/';
}

function redirect($path) {
    header('Location: ' . getContextRoot() . $path);
    release();
}

function initialize() 
{
    ob_start('ob_gzhandler');
    session_start();
}

function release() 
{
    Vault::closeConnection();
    ob_end_flush();
    die();
}

function processRegSub()
{
    include 'miscellaneous/reg-sub-processing.php';
    if (validatePost()) {
        if (emailIsFree()) {
            extractPostAndCreatePerson();
            return 0;
        } else {
            return 2;
        }
    } else {
        logFailedRegistrationAttempt();
        return 1;
    }
}

function logFailedLogInAttempt()
{
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $event = '{ "failedloginattempt": { "email":"' . $_POST['email'] . '", "password":"' . $password . '" } }';
    logAnomalityEvent($_SERVER['REMOTE_ADDR'], $event);
}

// See "all-in-one-seo-pack.example.html" in the miscellaneous folder for help on this one
function allInOneSEOPack(   $site_name, 
                            $title,
                            $url,
                            $description,
                            $long_description, 
                            $image, 
                            $published_time, 
                            $modified_time, 
                            $type, 
                            $twitter_card) 
{
    echo   '<!-- All in One SEO Pack 2.4.3 by Michael Torbert of Semper Fi Web Design[163,209] -->
            <meta name="description"  content="'.$description.'" />
            
            <meta property="og:title" content="'.$title.'" />
            <meta property="og:type" content="'.$type.'" />
            <meta property="og:url" content="'.$url.'" />
            <meta property="og:image" content="'.$image.'" />
            <meta property="og:site_name" content="'.$site_name.'" />
            <meta property="og:description" content="'.$long_description.'" />
            <meta property="article:published_time" content="'.$published_time.'" />
            <meta property="article:modified_time" content="'.$modified_time.'" />
            <meta name="twitter:card" content="'.$twitter_card.'" />
            <meta name="twitter:title" content="'.$title.'" />
            <meta name="twitter:description" content="'.$long_description.'" />
            <meta name="twitter:image" content="'.$image.'" />
            <meta itemprop="image" content="'.$image.'" />
            <!-- /all in one seo pack -->';
}