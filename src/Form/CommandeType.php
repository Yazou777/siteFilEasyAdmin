<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
        
            //->add('com_date')
            // ->add('com_commentaire', null, ['required' => true ,
            // 'label' => 'Commentaire',])
            // ->add('com_adresse_livraison', null, ['required' => true ,
            //     'label' => 'Adresse de livraison',])
            // ->add('com_adresse_facturation', null, ['required' => true,
            //     'label' => 'Adresse de facturation',])
            //->add('save', SubmitType::class)
            //->add('com_uti')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
