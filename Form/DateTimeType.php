<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mohebifar\DateTimeBundle\Form;

use Mohebifar\DateTimeBundle\Calendar\Proxy;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToLocalizedStringTransformer;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToTimestampTransformer;
use Symfony\Component\Form\ReversedTransformer;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Mohebifar\DateTimeBundle\Form\Transformer\DateTimeToArrayTransformer;

class DateTimeType extends AbstractType
{

    /**
     * @var \Mohebifar\DateTimeBundle\Calendar\Proxy
     */
    private $date;

    public function __construct(Proxy $date)
    {
        $this->date = $date;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $yearChoices = $options['years'];
        $monthChoices = $this->formatMonths($options['months']);
        $dayChoices = $options['days'];

        if($options['widget'] == 'choice') {
            $builder
                ->add('year', 'choice', array(
                    'choices' => $yearChoices
                ))
                ->add('month', 'choice', array(
                    'choices' => $monthChoices
                ))
                ->add('day', 'choice', array(
                    'choices' => $dayChoices
                ))
                ->addViewTransformer(new DateTimeToArrayTransformer(
                    $this->date, $options['model_timezone'], $options['view_timezone'], array('year', 'month', 'day')
                ))
                ->addModelTransformer(new ReversedTransformer(
                    new DateTimeToArrayTransformer($this->date, $options['model_timezone'], $options['model_timezone'], array('year', 'month', 'day'))
                ));
        } elseif($options['widget'] == 'jquery') {
            $builder
                ->add('date', 'text')
               ;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['widget'] = $options['widget'];
        $pattern = '{{ year }}{{ month }}{{ day }}';
        $view->vars['date_pattern'] = $pattern;
        $view->vars['driver'] = strtolower($this->date->getDriver());


    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {

        $resolver->setDefaults(array(
            'years' => range($this->date->format('Y') - 5, $this->date->format('Y') + 5),
            'months' => range(1, 12),
            'days' => range(1, 31),
            'widget' => 'choice',
            'input' => 'datetime',
            'model_timezone' => null,
            'view_timezone' => null,
            'by_reference' => false,
            'error_bubbling' => false,
            'data_class' => null
        ));

        $resolver->setAllowedValues(array(
            'input' => array(
                'datetime',
                'timestamp',
                'array',
            ),
            'widget' => array(
                'text',
                'choice',
                'jquery',
            ),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'mohebifar_datetime';
    }

    private function formatMonths($months, $format = 'F')
    {
        $formatted = array();
        foreach ($months as $i => $month) {
            $timestamp = $this->date->makeTime(0, 0, 0, $month, 1, null);
            $formatted[$i] = $this->date->format($format, $timestamp);
        }

        return $formatted;
    }
}
