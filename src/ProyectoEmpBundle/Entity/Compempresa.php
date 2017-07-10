<?php

namespace ProyectoEmpBundle\Entity;

/**
 * Compempresa
 */
class Compempresa {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $compName;

    /**
     * @var string
     */
    private $cif;

    /**
     * @var string
     */
    private $antiguedad;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $nombrePc;

    /**
     * @var string
     */
    private $telefonoPc;

    /**
     * @var string
     */
    private $emailPc;

    /**
     * @var string
     */
    private $compLogotipo;

    /**
     * @var \ProyectoEmpBundle\Entity\Eusuarios
     */
    private $idCompUsuarios;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set compName
     *
     * @param string $compName
     *
     * @return Compempresa
     */
    public function setCompName($compName) {
        $this->compName = $compName;

        return $this;
    }

    /**
     * Get compName
     *
     * @return string
     */
    public function getCompName() {
        return $this->compName;
    }

    /**
     * Set cif
     *
     * @param string $cif
     *
     * @return Compempresa
     */
    public function setCif($cif) {
        $this->cif = $cif;

        return $this;
    }

    /**
     * Get cif
     *
     * @return string
     */
    public function getCif() {
        return $this->cif;
    }

    /**
     * Set antiguedad
     *
     * @param string $antiguedad
     *
     * @return Compempresa
     */
    public function setAntiguedad($antiguedad) {
        $this->antiguedad = $antiguedad;

        return $this;
    }

    /**
     * Get antiguedad
     *
     * @return string
     */
    public function getAntiguedad() {
        return $this->antiguedad;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Compempresa
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
     * Set nombrePc
     *
     * @param string $nombrePc
     *
     * @return Compempresa
     */
    public function setNombrePc($nombrePc) {
        $this->nombrePc = $nombrePc;

        return $this;
    }

    /**
     * Get nombrePc
     *
     * @return string
     */
    public function getNombrePc() {
        return $this->nombrePc;
    }

    /**
     * Set telefonoPc
     *
     * @param string $telefonoPc
     *
     * @return Compempresa
     */
    public function setTelefonoPc($telefonoPc) {
        $this->telefonoPc = $telefonoPc;

        return $this;
    }

    /**
     * Get telefonoPc
     *
     * @return string
     */
    public function getTelefonoPc() {
        return $this->telefonoPc;
    }

    /**
     * Set emailPc
     *
     * @param string $emailPc
     *
     * @return Compempresa
     */
    public function setEmailPc($emailPc) {
        $this->emailPc = $emailPc;

        return $this;
    }

    /**
     * Get emailPc
     *
     * @return string
     */
    public function getEmailPc() {
        return $this->emailPc;
    }

    /**
     * Set compLogotipo
     *
     * @param string $compLogotipo
     *
     * @return Compempresa
     */
    public function setCompLogotipo($compLogotipo) {
        $this->compLogotipo = $compLogotipo;

        return $this;
    }

    /**
     * Get compLogotipo
     *
     * @return string
     */
    public function getCompLogotipo() {
        return $this->compLogotipo;
    }

        /**
     * Set IdCompUsuarios
     *
     * @param \ProyectoEmpBundle\Entity\Eusuarios $idCompUsuarios
     *
     * @return Compempresa
     */
    public function setIdCompUsuarios(\ProyectoEmpBundle\Entity\Eusuarios $idCompUsuarios = null) {
        $this->idCompUsuarios = $idCompUsuarios;

        return $this;
    }

    public function getIdCompUsuarios() {
        return $this->idCompUsuarios;
    }

    /**
     * Set idCompUsuarios
     *
     * @param integer $idCompUsuarios
     *
     * @return Compempresa
     */
    public function setUser(\ProyectoEmpBundle\Entity\Eusuarios $idCompUsuarios = null) {
        $this->idCompUsuarios = $idCompUsuarios;

        return $this;
    }

    /**
     * Get idCompUsuarios
     *
     * @return integer
     */
    public function getUser() {
        return $this->$idCompUsuarios;
    }

}
