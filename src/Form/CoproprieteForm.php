<?php

namespace App\Form;

use App\Entity\Copropriete;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoproprieteForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomCopropriete')
            ->add('adresseCopropriete')
            ->add('tantiemeCopropriete')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Copropriete::class,
        ]);
    }
}
