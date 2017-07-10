<?php

namespace ProyectoEmpBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Curriculum
 */
class Curriculum {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $genero;

    /**
     * @var string
     */
    private $dni;

    /**
     * @var string
     */
    private $fnacimiento;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $gradocapacidad;

    /**
     * @var string
     */
    private $idioma;

    /**
     * @var string
     */
    private $estudiante;

    /**
     * @var string
     */
    private $desempleado;

    /**
     * @var \ProyectoEmpBundle\Entity\Usuarios
     */
    private $idUsuario;
//    protected $experiencia;
//
//    public function __construct() {
//        $this->experiencia = new ArrayCollection();
//    }
//
//    public function getExperiencia() {
//        return $this->experiencia->toArray();
//    }
//    protected $experiencia;
//
//    public function __construct() {
//        $this->experiencia = new ArrayCollection();
//    }
//
//    public function getExperiencia() {
//        return $this->experiencia;
//    }
//
//    public function setExperiencia(ArrayCollection $experiencia) {
//        $this->experiencia = $experiencia;
//    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set genero
     *
     * @param string $genero
     *
     * @return Curriculum
     */
    public function setGenero($genero) {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string
     */
    public function getGenero() {
        return $this->genero;
    }

    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return Curriculum
     */
    public function setDni($dni) {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni() {
        return $this->dni;
    }

    /**
     * Set fnacimiento
     *
     * @param string $fnacimiento
     *
     * @return Curriculum
     */
    public function setFnacimiento($fnacimiento) {
        $this->fnacimiento = $fnacimiento;

        return $this;
    }

    /**
     * Get fnacimiento
     *
     * @return string
     */
    public function getFnacimiento() {
        return $this->fnacimiento;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Curriculum
     */
    public function setDireccion($direccion) {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion() {
        return $this->direccion;
    }

    /**
     * Set gradocapacidad
     *
     * @param string $gradocapacidad
     *
     * @return Curriculum
     */
    public function setGradocapacidad($gradocapacidad) {
        $this->gradocapacidad = $gradocapacidad;

        return $this;
    }

    /**
     * Get gradocapacidad
     *
     * @return string
     */
    public function getGradocapacidad() {
        return $this->gradocapacidad;
    }

    /**
     * Set idioma
     *
     * @param string $idioma
     *
     * @return Curriculum
     */
    public function setIdioma($idioma) {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get idioma
     *
     * @return string
     */
    public function getIdioma() {
        return $this->idioma;
    }

    /**
     * Set estudiante
     *
     * @param string $estudiante
     *
     * @return Curriculum
     */
    public function setEstudiante($estudiante) {
        $this->estudiante = $estudiante;

        return $this;
    }

    /**
     * Get estudiante
     *
     * @return string
     */
    public function getEstudiante() {
        return $this->estudiante;
    }

    /**
     * Set desempleado
     *
     * @param string $desempleado
     *
     * @return Curriculum
     */
    public function setDesempleado($desempleado) {
        $this->desempleado = $desempleado;

        return $this;
    }

    /**
     * Get desempleado
     *
     * @return string
     */
    public function getDesempleado() {
        return $this->desempleado;
    }

    /**
     * Set idUsuario
     *
     * @param \ProyectoEmpBundle\Entity\Usuarios $idUsuario
     *
     * @return Curriculum
     */
    public function setIdUsuario(\ProyectoEmpBundle\Entity\Usuarios $idUsuario = null) {
        $this->idUsuario = $idUsuario;

        return $this;
    }
    /**
     * Get idUsuario
     *
     * @return \ProyectoEmpBundle\Entity\Usuarios
     */
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setUser(\ProyectoEmpBundle\Entity\Usuarios $idUsuario = null) {
        $this->idUsuario = $idUsuario;

        return $this;
    }
    
     public function getUser() {
       

        return $this ->idUsuario;
    }

//    public function getUser() {
//        return $this->idUsuario;
//    }
public function __toString()
    {
        // TODO: Implement __toString() method.

       return $this->getIdioma();
    }
}
