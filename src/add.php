<?php
/**
 * Created by PhpStorm.
 * User: mithun.alinkil
 * Date: 07-11-2015
 * Time: 13:33
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

<!DOCTYPE html>
<html lang="en">
<head>
    <h1 align="center"> Add New Notes below </h1>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <br>
    <br>
</head>
<body>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <?php if ($formIsValid): ?>
        <?php
        $notesRepo = new \malinkil\AS3\SQLiteNotesRepository();
        $notes = new \malinkil\AS3\Notes();
        $notes->setNotes($mynotes);
        $notes->setSubject($subject);
        $notes->setAuthor($author);
        $createdDate=date('d M Y -g:i:s A');
        $notes->setDatecr($createdDate);
        $notesRepo->saveNote($notes);
        ?>


        <h1>Notes Added to the profile</h1>
        <p>Subject Line : <?php print $subject; ?></p>
        <p>Notes : <?php print $mynotes; ?></p>
        <p>Author : <?php print $author; ?></p>
        <p>Created On:<?php print $createdDate; ?></p>
       <strong><p><a href="index.php">Show All Notes</a></p></strong>

    <?php else: ?>

        <form action="add.php" method="post">
            <div class="container">
                <div class="form-group">

                    <label for="subjectline">Your Subject Line:
                        <input type="text" class="form-control" id="subjectline" name="subjectline" value="<?php print $subject; ?>"></label><?php print $subjectErr; ?>
                </div>
                <div class="form-group">

                    <label for="notes">Add your Notes here:
                        <input type="text"  name="mynotes" class="form-control" id="notes" value="<?php print $mynotes; ?>"></label>
                </div>
                <div class="form-group">

                    <label for="author">Add your author:
                        <input type="text" name="myauthor" class="form-control" id="author" value="<?php print $author; ?>"></label> <?php print $authorErr; ?>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
                <strong><a href="index.php"> Back to home page</a></strong>
            </div>
        </form>


    <?php endif; ?>
<?php else: ?>
    <form method="post" action="add.php">
        <div class="container">
            <div class="form-group">

                <label for="subjectline">Your Subject Line:</label>
                <input type="subjectline" class="form-control" name="subjectline" id="subjectline">
            </div>
            <div class="form-group">

                <label for="notes">Add your Notes here:</label>
                <input type="notes" class="form-control" name="mynotes" id="notes">
            </div>
            <div class="form-group">

                <label for="author">Add your author:</label>
                <input type="author" class="form-control" name="myauthor" id="author">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <strong><a href="index.php"> Back to home page</a></strong>
        </div>
    </form>

<?php endif; ?>
</body>
</html>
