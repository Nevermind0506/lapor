<?php
session_start();
session_destroy();
header("location: ../views/login_page.php");
