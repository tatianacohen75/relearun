<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EnvRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
   

    #[ORM\ManyToOne(targetEntity: Code::class, inversedBy: 'envs')]
    #[ORM\JoinColumn(nullable: false, onDelete:"CASCADE")]
   // #[Groups('read:item')]
    private $code;

    #[ORM\OneToMany(mappedBy: 'env', targetEntity: State::class, orphanRemoval:true)]
    #[ORM\JoinColumn(onDelete:"CASCADE")]
    private $states;



    public function __construct()
    {
        $this->states = new ArrayCollection();
    }
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


       /**
     * @return Collection|State[]
     */
    public function getStates(): Collection
    {
        return $this->states;
    }

    public function addState(State $state): self
    {
        if (!$this->states->contains($state)) {
            $this->states[] = $state;
            $state->setEnv($this);
        }

        return $this;
    }

    public function removeState(State $state): self
    {
        if ($this->states->removeElement($state)) {
            // set the owning side to null (unless already changed)
            if ($state->getEnv() === $this) {
                $state->setEnv(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return (string) $this->getId();
    }
}
