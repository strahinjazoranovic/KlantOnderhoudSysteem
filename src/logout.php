<?php
//-----------------------------------------------
//-- Naam script: logout.php 
//-- Omschrijving: Uitlog logic
//-- Naam ontwikkelaar: Strahinja Zoranovic
//-- Project: KlantOnderHoudsysteem
//-- Datum: 28/03/2025
------------------------------------------------
session_start();
session_unset();
session_destroy();
header('Location: login.php');
exit;
