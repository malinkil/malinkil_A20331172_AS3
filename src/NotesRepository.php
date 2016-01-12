<?php
/**
 * Created by PhpStorm.
 * User: mithun.alinkil
 * Date: 07-11-2015
 * Time: 13:42
 */

namespace malinkil\AS3;


interface NotesRepository
{
    public function saveNote($notes);
    public function getAllNotes();
    public function getNoteById($id);
    public function deleteNote($noteId);

}