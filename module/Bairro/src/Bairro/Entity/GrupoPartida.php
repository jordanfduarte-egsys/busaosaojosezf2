<?php

namespace Bairro\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrupoPartida
 *
 * @ORM\Table(name="grupo_partida")
 * @ORM\Entity
 */
class GrupoPartida
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idgrupo_partida", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idgrupoPartida;

    /**
     * @var array
     *
     * @ORM\Column(name="grupo", type="simple_array", nullable=false)
     */
    private $grupo;

    /**
     * @var string
     *
     * @ORM\Column(name="partida", type="text", length=65535, nullable=false)
     */
    private $partida;

    /**
     * @var integer
     *
     * @ORM\Column(name="idhorario", type="integer", nullable=false)
     */
    private $idhorario;


}

