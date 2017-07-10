<?php

namespace ProyectoEmpBundle\Entity;

/**
 * Eofertas
 */
class Eofertas
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titulopuesto;

    /**
     * @var string
     */
    private $provinciapuesto;

    /**
     * @var integer
     */
    private $numerovacaantes;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $nivelestudios;

    /**
     * @var string
     */
    private $experienciareq;

    /**
     * @var string
     */
    private $idiomas;

    /**
     * @var string
     */
    private $jornada;

    /**
     * @var string
     */
    private $salario;

    /**
     * @var string
     */
    private $duracion;

    /**
     * @var string
     */
    private $tipocontrato;

    /**
     * @var string
     */
    private $horario;

    /**
     * @var string
     */
    private $personalacargo;  

    /**
     * @var string
     */
    private $estado;        
    
    /**
     * @var \ProyectoEmpBundle\Entity\Eofertas
     */
    private $idOfertaComp;


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
     * Set titulopuesto
     *
     * @param string $titulopuesto
     *
     * @return Eofertas
     */
    public function setTitulopuesto($titulopuesto)
    {
        $this->titulopuesto = $titulopuesto;

        return $this;
    }

    /**
     * Get titulopuesto
     *
     * @return string
     */
    public function getTitulopuesto()
    {
        return $this->titulopuesto;
    }

    /**
     * Set provinciapuesto
     *
     * @param string $provinciapuesto
     *
     * @return Eofertas
     */
    public function setProvinciapuesto($provinciapuesto)
    {
        $this->provinciapuesto = $provinciapuesto;

        return $this;
    }

    /**
     * Get provinciapuesto
     *
     * @return string
     */
    public function getProvinciapuesto()
    {
        return $this->provinciapuesto;
    }

    /**
     * Set numerovacaantes
     *
     * @param integer $numerovacaantes
     *
     * @return Eofertas
     */
    public function setNumerovacaantes($numerovacaantes)
    {
        $this->numerovacaantes = $numerovacaantes;

        return $this;
    }

    /**
     * Get numerovacaantes
     *
     * @return integer
     */
    public function getNumerovacaantes()
    {
        return $this->numerovacaantes;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Eofertas
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set nivelestudios
     *
     * @param string $nivelestudios
     *
     * @return Eofertas
     */
    public function setNivelestudios($nivelestudios)
    {
        $this->nivelestudios = $nivelestudios;

        return $this;
    }

    /**
     * Get nivelestudios
     *
     * @return string
     */
    public function getNivelestudios()
    {
        return $this->nivelestudios;
    }

    /**
     * Set experienciareq
     *
     * @param string $experienciareq
     *
     * @return Eofertas
     */
    public function setExperienciareq($experienciareq)
    {
        $this->experienciareq = $experienciareq;

        return $this;
    }

    /**
     * Get experienciareq
     *
     * @return string
     */
    public function getExperienciareq()
    {
        return $this->experienciareq;
    }

    /**
     * Set idiomas
     *
     * @param string $idiomas
     *
     * @return Eofertas
     */
    public function setIdiomas($idiomas)
    {
        $this->idiomas = $idiomas;

        return $this;
    }

    /**
     * Get idiomas
     *
     * @return string
     */
    public function getIdiomas()
    {
        return $this->idiomas;
    }

    /**
     * Set jornada
     *
     * @param string $jornada
     *
     * @return Eofertas
     */
    public function setJornada($jornada)
    {
        $this->jornada = $jornada;

        return $this;
    }

    /**
     * Get jornada
     *
     * @return string
     */
    public function getJornada()
    {
        return $this->jornada;
    }

    /**
     * Set salario
     *
     * @param string $salario
     *
     * @return Eofertas
     */
    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Get salario
     *
     * @return string
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Set duracion
     *
     * @param string $duracion
     *
     * @return Eofertas
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
     * Set tipocontrato
     *
     * @param string $tipocontrato
     *
     * @return Eofertas
     */
    public function setTipocontrato($tipocontrato)
    {
        $this->tipocontrato = $tipocontrato;

        return $this;
    }

    /**
     * Get tipocontrato
     *
     * @return string
     */
    public function getTipocontrato()
    {
        return $this->tipocontrato;
    }

    /**
     * Set horario
     *
     * @param string $horario
     *
     * @return Eofertas
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;

        return $this;
    }

    /**
     * Get horario
     *
     * @return string
     */
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * Set personalacargo
     *
     * @param string $personalacargo
     *
     * @return Eofertas
     */
    public function setPersonalacargo($personalacargo)
    {
        $this->personalacargo = $personalacargo;

        return $this;
    }

    /**
     * Get personalacargo
     *
     * @return string
     */
    public function getPersonalacargo()
    {
        return $this->personalacargo;
    }

     public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get horario
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }
    
    /**
     * Set idOfertaComp
     *
     * @param \ProyectoEmpBundle\Entity\Compempresa $idOfertaComp
     *
     * @return Eofertas
     */
    public function setEmpresa(\ProyectoEmpBundle\Entity\Compempresa $idOfertaComp = null)
    {
        $this->idOfertaComp = $idOfertaComp;

        return $this;
    }

    /**
     * Get idOfertaComp
     *
     * @return \ProyectoEmpBundle\Entity\Compempresa
     */
    public function getEmpresa()
    {
        return $this->idOfertaComp;
    }
}

