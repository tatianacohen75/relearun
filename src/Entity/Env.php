<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EnvRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EnvRepository::class)]
#[ApiResource (
    //     collectionOperations: [
    //         'get' => ['method' => 'get'],
    // //     ],
    // //     itemOperations: [
    // //     'get'=> ['method' => 'get'],
    // // ],
    //     normalizationContext:['groups' => ['read:collection', 'read:item', 'read:Post']],
    //     denormalizationContext:['groups' => ['put:Post']],
    //     itemOperations:['put', 
    //                     'delete', 
    //                     'get' 
    //                     //=> ['normalization_context'=> ['groups'=> ['read:collection', 'read:item', 'read:Post'] ]] 
    //                     ]
    
    )
    ]
class Env
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
  //  #[Groups('read:item')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
  //  #[Groups('put:Post', 'read:item')]
    private $name;

    #[ORM\ManyToOne(targetEntity: Code::class)]
    #[ORM\JoinColumn(nullable: false)]
   // #[Groups('read:item')]
    private $code;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCode(): ?Code
    {
        return $this->code;
    }

    public function setCode(?Code $code): self
    {
        $this->code = $code;

        return $this;
    }
}
