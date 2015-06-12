<?php

namespace Bairro\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bairro
 *
 * @ORM\Table(name="bairro")
 * @ORM\Entity
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


}

