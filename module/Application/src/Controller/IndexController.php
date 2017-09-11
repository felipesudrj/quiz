<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {
    /**
     * Tela inicial e publica do sistema
     */
    public function indexAction() {
        return new ViewModel();
    }

    /**
     * Listar todos os quiz cadastrados no sistema
     */
    public function loadAction() {
        $arrQuiz = array();

        $arrModel = array(
            'arrQuiz' => $arrQuiz,
        );

        return new JsonModel($arrModel);
    }
}
