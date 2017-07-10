<?php

namespace ProyectoEmpBundle\Entity;

/**
 * Experiencia
 */
class Experiencia
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var string
     */
    private $duracion;

    /**
     * @var string
     */
    private $empresa;

    /**
     * @var string
     */
    private $cargo;

    /**
     * @var \ProyectoEmpBundle\Entity\Curriculum
     */
    private $idCurriculum;


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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Experiencia
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set duracion
     *
     * @param string $duracion
     *
     * @return Experiencia
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get duracion
     *
     * @return string
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     *
     * @return Experiencia
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     *
     * @return Experiencia
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set idCurriculum
     *
     * @param \ProyectoEmpBundle\Entity\Curriculum $idCurriculum
     *
     * @return Experiencia
     */
    public function setCurriculum(\ProyectoEmpBundle\Entity\Curriculum $idCurriculum = null)
    {
        $this->idCurriculum = $idCurriculum;

        return $this;
    }

    /**
     * Get idCurriculum
     *
     * @return \ProyectoEmpBundle\Entity\Curriculum
     */
    public function getCurriculum()
    {
        return $this->idCurriculum;
    }

    /**
     * Set idCurriculum
     *
     * @param \ProyectoEmpBundle\Entity\Curriculum $idCurriculum
     *
     * @return Experiencia
     */
    public function setIdCurriculum(\ProyectoEmpBundle\Entity\Curriculum $idCurriculum = null)
    {
        $this->idCurriculum = $idCurriculum;

        return $this;
    }

    /**
     * Get idCurriculum
     *
     * @return \ProyectoEmpBundle\Entity\Curriculum
     */
    public function getIdCurriculum()
    {
        return $this->idCurriculum;
    }
}
