<?php
/**
 * Created by PhpStorm.
 * User: mithun.alinkil
 * Date: 07-11-2015
 * Time: 13:37
 */
require_once 'Notes.php';
require_once 'SQLiteNotesRepository.php';

session_start();
if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit;
}


$notesRepo = new\malinkil\AS3\SQLiteNotesRepository();
?>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id'])): ?>
<?php
$notesRepo->deleteNote($_POST['id']);
 ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete Note</title>
    </head>
    <body>
    <h1>Note Deleted</h1>
    <p><a href="index.php">Back to Note List</a></p>
    </body>
    </html>
<?php else: ?>
    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Document</title>
    </head>
    <body>
      <h1>No Note Selected for deletion</h1>
     <strong><p><a href="index.php">Back to Note List</a></p></strong>
    </body>
    </html>
<?php endif; ?>
