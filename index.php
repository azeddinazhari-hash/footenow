<?php
/**
 * Redirect to the main application entry point.
 * This file allows XAMPP/Apache to automatically load the app
 * when accessing the root directory.
 */
header("Location: api/index.php");
exit;
