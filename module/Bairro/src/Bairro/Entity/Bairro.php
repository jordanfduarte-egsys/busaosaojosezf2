<?php

namespace Bairro\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bairro
 *
 * @ORM\Table(name="bairro")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Bairro\Entity\Bairro\Repository")
 */
class Bairro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idbairro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbairro;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;



    /**
     * Get idbairro
     *
     * @return integer
     */
    public function getIdbairro()
    {
        return $this->idbairro;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Bairro
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }
}
