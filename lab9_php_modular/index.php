<?php
session_start();
include 'config/data_base.php';

$module = isset($_GET['module']) ? $_GET['module'] : 'dashboard';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// --- SECURITY CHECK ---
if (!isset($_SESSION['is_login']) && $module != 'auth') {
    header("Location: index.php?module=auth&action=login");
    exit;
}

if ($module != 'auth') { include 'views/header.php'; }

// --- ROUTING LENGKAP ---
if ($module == 'dashboard') {
    include 'views/dashboard.php';
} 
elseif ($module == 'user') {
    if ($action == 'list') { include 'modules/user/list.php'; } 
    elseif ($action == 'add') { include 'modules/user/add.php'; } 
    elseif ($action == 'edit') { include 'modules/user/edit.php'; } 
    elseif ($action == 'delete') { include 'modules/user/delete.php'; }
} 
// --- ROUTING BARANG (BARU) ---
elseif ($module == 'barang') {
    if ($action == 'list') { include 'modules/barang/list.php'; } 
    elseif ($action == 'add') { include 'modules/barang/add.php'; } 
    elseif ($action == 'edit') { include 'modules/barang/edit.php'; } 
    elseif ($action == 'delete') { include 'modules/barang/delete.php'; }
}
// -----------------------------
elseif ($module == 'auth') {
    if ($action == 'login') { include 'modules/auth/login.php'; } 
    elseif ($action == 'logout') { include 'modules/auth/logout.php'; }
} 
else {
    include 'views/dashboard.php';
}

if ($module != 'auth') { include 'views/footer.php'; }
?>