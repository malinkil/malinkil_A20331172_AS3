<?php
/**
 * Created by PhpStorm.
 * User: mithun.alinkil
 * Date: 07-11-2015
 * Time: 13:45
 */
require_once 'SQLiteNotesRepository.php';
require_once 'Notes.php';

session_start();
if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit;
}


$noteData = new \malinkil\AS3\SQLiteNotesRepository();
$noteList = $noteData->getAllNotes();
?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<h1 align = 'center'>Notes Created see Below</h1>
<div class = "scroll">
    <table class = " ViewTable" >
        <tr>
            <th class = "viewTableHead">ID</th>
            <th class = "viewTableHead">Subject</th>
            <th class = "viewTableHead">Notes</th>
            <th class = "viewTableHead">Author</th>
            <th class = "viewTableHead">Count</th>
            <th class = "viewTableHead">Created/Updated Date</th>
            <th class = "viewTableHead"></th>
        </tr>
        <strong><a href="index.php">Back to homepage</a></strong>

        <?php
        foreach($noteList as $allNotes) {
            print '<tr>';
            print '<td class ="viewTableData">' . $allNotes->getId() . '</td>';
            print '<td class ="mynotesoverflow viewTableData"><a href="show.php?id='.$allNotes->getId() .'">'. $allNotes->getSubject() .' </a></td>';
            print '<td class ="mynotesoverflow viewTableData">' . $allNotes->getNotes() . '</td>';
            print '<td class ="viewTableData">' . $allNotes->getAuthor() . '</td>';
            $count = strlen($allNotes->getNotes());
            print '<td class ="viewTableData">' . $count;  '</td>';
            print '<td class ="viewTableData">' . $allNotes->getDatecr() . '</td>';
            print '<td class ="viewTableShow"><a href="show.php?id='.$allNotes->getId() .'"><input type="button" value="view"></a></td>';
            print '</tr>';
        }
        ?>
    </table>
</div>
</body>
</html>

