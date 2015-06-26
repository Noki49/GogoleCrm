<?php

namespace Gogole\GestionStockBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class stockManagerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ref')
            ->add('nom')
            ->add('pa')
            ->add('pv')
//          ->add('marge')
            ->add('qttStock')
            ->add('qttSeuil')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gogole\GestionStockBundle\Entity\stockManager'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gogole_gestionstockbundle_stockmanager';
    }
}
