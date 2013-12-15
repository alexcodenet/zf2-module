<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Custom\Form;

use Zend\Form\Form;

class UbuntuForm extends Form
{
    public function __construct($name = NULL)
    {
        parent::__construct($name);
        
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        
        $this->add(array(
            'name' => 'code_name',
            'type' => 'Text',
            'options' => array(
                'label' => 'Code name',
            ),
        ));
        
        $this->add(array(
            'name' => 'version',
            'type' => 'Text',
            'options' => array(
                'label' => 'Version',
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Create',
                'id' => 'submitbutton',
            ),
        ));
    }
}