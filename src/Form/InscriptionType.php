<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Prenom')
            ->add('Nom')
            ->add('Pseudo')
            ->add('Password', PasswordType::class)
            ->add('Confirm_Password', PasswordType::class)
            ->add('save', SubmitType::class, [
                "attr" => [
                    "class"=>"inscription_btn d-flex flex-row-reverse p-2"
                ],
                'label' => 'Inscription'])
         
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
