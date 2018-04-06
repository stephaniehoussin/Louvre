<?php

namespace P4\LouvreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class TicketType
 * @package P4\LouvreBundle\Form
 */
class TicketType extends AbstractType
{
    protected $minYear, $maxYear;

    public function __construct()
    {
        $now = new \DateTime('now');
        $this->maxYear = (int) $now->format('Y');
        $this->minYear = $this->maxYear -120;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName',TextType::class,array(
                'label' => 'last name'
            ))
            ->add('firstName',TextType::class,array(
                'label' => 'first name'
            ))
            ->add('country', CountryType::class,array(
                'label' => 'country',
                'preferred_choices' => array('FR')
            ))
            ->add('birthDate',BirthdayType::class,array(
                'label' => 'birth date',
                'html5'=>'true',
                'format' => 'dd/MM/yyy',
                'years' => range($this->minYear, $this->maxYear)

                ))
            ->add('reducedPrice',CheckboxType::class,array(
                'label' => 'reduced price',
                'required'=>false,
    ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'P4\LouvreBundle\Entity\Ticket'
        ));
    }

}
