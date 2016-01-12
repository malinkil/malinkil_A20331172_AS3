<?php
/**
 * Created by PhpStorm.
 * User: mithun.alinkil
 * Date: 07-11-2015
 * Time: 13:51
 */

namespace malinkil\AS3;

require_once 'NotesRepository.php';
require_once 'Notes.php';


class SQLiteNotesRepository implements NotesRepository
{

    private $dbfile = 'data/notes_db_pdo.sqlite';
    private $db;

    public function __construct(){
        //open the database
        $this->db = new \PDO('sqlite:' . $this->dbfile);

        //create the table if not exists
        $this->db->exec("CREATE TABLE IF NOT EXISTS Notes (Id INTEGER PRIMARY KEY, Subject TEXT, Notes TEXT, Author TEXT, Datecr TEXT)");
    }
    public function saveNote($notes)
    {
        // TODO: Implement saveNote() method.
         if($notes->getId() != ''){
             //Update note
             $noteStmh = $this->db->prepare("UPDATE Notes SET Subject = :subject , Notes = :notes , Author = :author ,Datecr = :datecr  WHERE Id = :id ");
             $noteStmh->bindParam(':subject', $notes->getSubject());
             $noteStmh->bindParam(':notes', $notes->getNotes());
             $noteStmh->bindParam(':author', $notes->getAuthor());
             $noteStmh->bindParam(':datecr', $notes->getDatecr());
             $noteStmh->bindParam(':id', $notes->getId());
             $noteStmh->execute();
         }else{
             //Insert
             $noteStmh = $this->db->prepare("INSERT INTO  Notes (Subject , Notes  , Author ,Datecr ) VALUES (:subject ,:notes ,:author ,:datecr  )  ");
             $noteStmh->bindParam(':subject', $notes->getSubject());
             $noteStmh->bindParam(':notes', $notes->getNotes());
             $noteStmh->bindParam(':author', $notes->getAuthor());
             $noteStmh->bindParam(':datecr', $notes->getDatecr());
             $noteStmh->execute();
         }

    }

    public function getAllNotes()
    {
        // TODO: Implement getAllNotes() method.
        $noteslist = array();
        $result = $this->db->query('SELECT * FROM Notes');
        foreach($result as $row) {
            $myNotes = new Notes();
            $myNotes->setSubject($row['Subject']);
            $myNotes->setNotes($row['Notes']);
            $myNotes->setAuthor($row['Author']);
            $myNotes->setId($row['Id']);
            $myNotes->setDatecr($row['Datecr']);
            $noteslist[$myNotes->getId()] = $myNotes;
        }
        return $noteslist;
    }

    public function getNoteById($id)
    {
        // TODO: Implement getNoteById() method.
        $noteStmh = $this->db->prepare("SELECT * from Notes WHERE Id = :id");
        $nid = intval($id);
        $noteStmh->bindParam(':id', $nid);
        $noteStmh->execute();
        $noteStmh->setFetchMode(\PDO::FETCH_ASSOC);

        if ($row = $noteStmh->fetch()) {
            $myNotes = new Notes();
            $myNotes->setSubject($row['Subject']);
            $myNotes->setNotes($row['Notes']);
            $myNotes->setAuthor($row['Author']);
            $myNotes->setId($row['Id']);
            $myNotes->setDatecr($row['Datecr']);
            return $myNotes;
        } else {
            return new Notes();
        }

//        $noteList = $this->getAllNotes();
//        if (array_key_exists($id, $noteList)) {
//            return $noteList[$id];
//        }
    }

    public function deleteNote($noteId)
    {
        // TODO: Implement deleteNote() method.
        $noteStmh = $this->db->prepare("DELETE FROM Notes WHERE id = :id");
        $noteStmh->bindParam(':id', intval($noteId));
        $noteStmh->execute();
    }


}