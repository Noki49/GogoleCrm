<?php

namespace Gogole\ContactBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class societeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomSociete')
            ->add('siretSociete')
            ->add('eMailSociete')
            ->add('telSociete')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gogole\ContactBundle\Entity\societe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gogole_contactbundle_societe';
    }
}
