<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Publication;
/**
 * Comment
 */
class Comment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $pseudo;

    /**
     * @var string
     */
    private $message;

    /**
    * @var Publication
    */
    private $publication;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return Comment
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Comment
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get publication
     *
     * @return string
     */
    public function getPublication()
    {
      return $this->publication;
    }

    /**
     * Set publication
     *
     * @param string $publication
     *
     * @return Publication
     */
    public function setPublication(Publication $publication)
    {
      $this->publication = $publication;
    }
}
