<?php

namespace Bairro\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Horario
 *
 * @ORM\Table(name="horario")
 * @ORM\Entity
 */
class Horario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idhorario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idhorario;

    /**
     * @var string
     *
     * @ORM\Column(name="cod", type="string", length=10, nullable=false)
     */
    private $cod;

    /**
     * @var string
     *
     * @ORM\Column(name="tabela", type="text", length=65535, nullable=false)
     */
    private $tabela;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="text", length=65535, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="coordenadas", type="text", length=65535, nullable=true)
     */
    private $coordenadas;

    /**
     * @var string
     *
     * @ORM\Column(name="itinerarios", type="text", length=65535, nullable=true)
     */
    private $itinerarios;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vigencia", type="date", nullable=false)
     */
    private $vigencia;

    /**
     * @var integer
     *
     * @ORM\Column(name="ischecked", type="integer", nullable=true)
     */
    private $ischecked = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="link_pdf", type="string", length=255, nullable=true)
     */
    private $linkPdf;

    /**
     * @var string
     *
     * @ORM\Column(name="link_map", type="string", length=255, nullable=true)
     */
    private $linkMap;


}

