<?php

namespace App\Form;

use App\Entity\State;
use App\Entity\Env;
use App\Entity\Version;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('createdDate')
            ->add('name')
            ->add('env', EntityType::class, ['class'=>Env::class, 'choice_label'=>'name'])
            ->add('version', EntityType::class, ['class'=>Version::class, 'choice_label' => 'name'])
        ;
    }
   
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => State::class,
        ]);
    }
}
