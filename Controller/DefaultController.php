<?php

namespace Mohebifar\DateTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/datepicker")
     * @Template()
     */
    public function indexAction()
    {
        $testDate = new \DateTime("1993-08-27");

        $form = $this->createFormBuilder()
            ->add('date1', 'mohebifar_datetime', array('widget' => 'choice'))
            ->add('date2', 'mohebifar_datetime', array('widget' => 'jquery'))
            ->add('date3', 'mohebifar_datetime', array('widget' => 'jquery'))
//            ->add('date1', 'text', array())
            ->getForm();

        return array('form' => $form->createView(), 'test' => $testDate);
    }
}
