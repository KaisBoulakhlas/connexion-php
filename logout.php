<?php

require_once 'Authentication.php';
Authentication::logout();
header("Location: login.php");