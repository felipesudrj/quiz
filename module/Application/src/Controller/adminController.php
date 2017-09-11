<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Controller\AbstractController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class AdminController extends AbstractController {
    public function indexAction() {

        return new ViewModel();
    }

    public function saveAction() {

        $sn_status = false;
        $ds_mensagem = null;
        $objRetorno = null;

        try {

            $arrDados = $this->getArrPost();

            $objQuiz = $this->getRepository(\Application\Entidade\Quiz::class)
                ->findOneBy(
                    array(
                        'id'=>$arrDados['id']
                        )
                    );

            $objRetorno = $this->getRepository(\Application\Entidade\Quiz::class)
                ->doPersitir(
                    $objQuiz,
                    $arrDados);


            $sn_status = true;
            $ds_mensagem = "Registro salvo com sucesso";
        } catch (\Exception $objException) {

            $ds_mensagem=$objException->getMessage();
        }

        $arrRetorno['sn_status'] = $sn_status;
        $arrRetorno['ds_mensagem'] = $ds_mensagem;
        $arrRetorno['objeto'] = $objRetorno;

        return new JsonModel($arrRetorno);
    }
}
