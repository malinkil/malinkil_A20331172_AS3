<?php
/**
 * Created by PhpStorm.
 * User: mithun.alinkil
 * Date: 07-11-2015
 * Time: 13:38
 */
require_once 'Notes.php';
require_once 'SQLiteNotesRepository.php';
date_default_timezone_set('America/Chicago');

session_start();
if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit;
}


$noteRepo = new\malinkil\AS3\SQLiteNotesRepository();

//Shortend Post variable names if set
$subject = isset($_POST['subjectline']) ? trim($_POST['subjectline']) : '';
$author = isset($_POST['myauthor']) ? trim($_POST['myauthor']) : '';
$mynotes = isset($_POST['mynotes'])  ? trim($_POST['mynotes']) : '';
$createdDate = isset($_POST['date'])  ? trim($_POST['date']) : '';

//Validate form fields
$formIsValid = true;
$subjectErr = '';
$authorErr = '';


if (empty($subject)){
    $formIsValid = false;
    $subjectErr = '<span style="color: #f00;">Subject is required!</span>';
}
if (empty($author)){
    $formIsValid = false;
    $authorErr = '<span style="color: #f00;">Author is required!</span>';
}

?>


<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id'])): ?>

    <?php
    // Came from show page based on id parameter
    $note = $noteRepo->getNoteById($_POST['id']);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <h1 align="center"> Edit Notes below </h1>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <br>
        <br>
    </head>
    <body>
    <h2>Edit Note</h2>
    <form method="post" action="editnote.php">
        <input type="hidden" name="noteId" value="<?php print $_POST['id']; ?>">
        <div class="form-group">
            <label>Your Subject Line: <input type="text" name="subjectline" class="form-control" value="<?php print $note->getSubject(); ?>"></label><br></div>
        <div class="form-group">
            <label>Add your Notes here: <input type="text" name="mynotes" class="form-control" value="<?php print $note->getNotes(); ?>"></label><br></div>
        <div class="form-group">
            <label>Add your author: <input type="text" name="myauthor" class="form-control" value="<?php print $note->getAuthor(); ?>"></label><br></div>
        <input type="submit" class="btn btn-primary" value="Save Note">
        <strong><a href="index.php">Back to Note List</a></strong>
    </form>

<?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['noteId'])): ?>

    <?php if ($formIsValid): ?>
        <?php
        //Process valid data and save note update
        $notesRepo = new \malinkil\AS3\SQLiteNotesRepository();
        $notes = $notesRepo->getNoteById($_POST['noteId']);
        $notes->setNotes($mynotes);
        $notes->setSubject($subject);
        $notes->setAuthor($author);
        $createdDate=date('d M Y -g:i:s A');
        $notes->setDatecr($createdDate);
        $notesRepo->saveNote($notes);
        ?>
        <title>Update Note</title>
        <h1>Note Updated</h1>
        <p><a href="index.php">Back to Note List</a></p>
        </body>
        </html>
    <?php else: ?>
        <h2>Edit Note</h2>
        <form method="post" action="editnote.php">
            <input type="hidden" name="noteId" value="<?php print $_POST['noteId']; ?>">
            <div class="form-group">
                <label>Your Subject Line: <input type="text" name="subjectline" class="form-control value="<?php print $subject; ?>"></label><?php print $subjectErr; ?><br></div>
            <div class="form-group">
                <label>Add your Notes here: <input type="text" name="mynotes" class="form-control value="<?php print $mynotes; ?>"></label><br></div>
            <div class="form-group">
                <label>Add your author: <input type="text" name="myauthor" class="form-control value="<?php print $author; ?>"></label><?php print $authorErr; ?><br></div>
            <input type= "submit" class="btn btn-primary" value="Save">
            <p><strong><a href="index.php">Back to Note List</a></strong></p>
        </form>
    <?php endif; ?>

<?php else: ?>
    <title>Document</title>
    <h1>No Note Selected for Editing</h1>
    <p><strong><a href="index.php">Back to Note List</a></strong></p>
<?php endif;?>
</body>
</html>
