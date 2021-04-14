<?php
// Cierra la session
    session_start();
    session_unset();
    session_destroy();
    header("location: ../?x=5");