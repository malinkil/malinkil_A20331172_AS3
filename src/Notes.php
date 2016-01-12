<?php
/**
 * Created by PhpStorm.
 * User: mithun.alinkil
 * Date: 07-11-2015
 * Time: 13:40
 */

namespace malinkil\AS3;


class Notes
{
    private $id;
    private $subject = '';
    private $notes = '';
    private $author = '';
    private $datecr = '';


    public function __construct(){
//        $this->id = uniqid();
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getDatecr()
    {
        return $this->datecr;
    }

    /**
     * @param string $datecr
     */
    public function setDatecr($datecr)
    {
        $this->datecr = $datecr;
    }


    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }


}