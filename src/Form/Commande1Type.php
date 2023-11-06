<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Commande1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('com_date')
            ->add('com_commentaire')
            ->add('com_adresse_livraison')
            ->add('com_adresse_facturation')
            ->add('com_isPaid')
            ->add('com_moyen_paiement')
            ->add('com_stripe_session_id')
            ->add('com_paypal_id')
            ->add('com_uti')
            ->add('com_transporteur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
