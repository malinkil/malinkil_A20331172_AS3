<?php
/**
 * Created by PhpStorm.
 * User: mithun.alinkil
 * Date: 07-11-2015
 * Time: 13:35
 */
require_once 'SQLiteNotesRepository.php';
require_once 'Notes.php';

session_start();
if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit;
}


$noteRepo = new\malinkil\AS3\SQLiteNotesRepository();

$noteId = isset($_GET['id'])? $_GET['id']: '';

$notes = $noteRepo->getNoteById($noteId);

?>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id'])): ?>

<?php
// Came from show page based on id parameter
$notes = $noteRepo->getNoteById($_POST['id']);
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
<h1>Do You want to delete this note</h1>
<p>Subject: <?php print $notes->getSubject();?></p>
<p>Notes: <?php print $notes->getNotes();?></p>
<p>Author: <?php print $notes->getAuthor();?></p>
<p>Date: <?php print $notes->getDatecr();?></p>
<p>
<form action="deleteNote.php" method="POST">
    <input type="hidden" name="id" value="<?php print $notes->getId();?>">
    <input type="submit" class="btn btn-primary btn-sm" value="Yes">
    <input type="button" value="No" class="btn btn-primary btn-sm" onclick="document.location.href='index.php'" />
</form>
</p>
<a href="index.php">Back to List</a>
<?php else: ?>
    <title>Delete</title>
    <h1>No Notes Found</h1>
    <strong><a href="index.php">Back to List</a></strong>
<?php endif; ?>
</body>
</html>

