<?php

namespace ProyectoEmpBundle\Entity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Eusuarios
 */
class Eusuarios implements userInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apellido;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $role;

    /**
     * @var string
     */
    private $tef;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;
    
    //AUTH
      
     public function getUsername(){
         return $this->email;
     } 
     
     public function getSalt(){
         return null;
     }
     
     public function getRoles(){
        return array($this->getRole()) ;
     }
     
     public function eraseCredentials(){
          
     }
    //END AUTH
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Eusuarios
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    
    /**
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Eusuarios
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Eusuarios
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return Eusuarios
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set tef
     *
     * @param string $tef
     *
     * @return Eusuarios
     */
    public function setTef($tef)
    {
        $this->tef = $tef;

        return $this;
    }

    /**
     * Get tef
     *
     * @return string
     */
    public function getTef()
    {
        return $this->tef;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Eusuarios
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Eusuarios
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    
    public function getTable()
    {
        return "Eusuarios";
    }
}
