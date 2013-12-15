<?php

namespace Custom\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Custom\Model\Ubuntu;
use Custom\Form\UbuntuForm;

class CrudController extends AbstractActionController
{
    protected $ubuntuTable;
    
    public function readAction()
    {
        return new ViewModel(array(
            'releases' => $this->getUbuntuTable()->fetchAll(),
        ));
    }
    
    public function createAction()
    {
        $form = new UbuntuForm('ubuntu');
        $form->get('submit')->setValue('Create');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $ubuntu = new Ubuntu();
            $form->setInputFilter($ubuntu->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $ubuntu->exchangeArray($form->getData());
                if($this->getUbuntuTable()->saveUbuntu($ubuntu)) {
                    return $this->redirect()->toRoute('crud');
                }
                else {
                    return $this->redirect()->toRoute('crud', array(
                                'action' => 'create'
                                ));
                }
            }
        }
        return array('form' => $form);
    }
    
    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('crud', array(
                'action' => 'create'
            ));
        }
        
        try {
            $ubuntu = $this->getUbuntuTable()->getUbuntu($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('crud', array(
                'action' => 'read'
            ));
        }

        $form  = new UbuntuForm('ubuntu');
        $form->bind($ubuntu);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($ubuntu->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                if($this->getUbuntuTable()->saveUbuntu($form->getData())) {
                    return $this->redirect()->toRoute('crud');
                }
                else {
                    //return error
                }
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }
    
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('crud');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getUbuntuTable()->deleteUbuntu($id);
            }

            return $this->redirect()->toRoute('crud');
        }

        return array(
            'id'    => $id,
            'ubuntu' => $this->getUbuntuTable()->getUbuntu($id)
        );
    }
    
    public function getUbuntuTable()
    {
        if (!$this->ubuntuTable) {
            $sm = $this->getServiceLocator();
            $this->ubuntuTable = $sm->get('Custom\Model\UbuntuTable');
        }
        return $this->ubuntuTable;
    }
    
}