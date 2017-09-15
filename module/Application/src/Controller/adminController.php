<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Controller\AbstractController;
use Application\Entidade\Question;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

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
                        'id' => $arrDados['id'],
                    )
                );

            $objRetorno = $this->getRepository(\Application\Entidade\Quiz::class)
                ->doPersitir(
                    $objQuiz,
                    $arrDados);

            $sn_status = true;
            $ds_mensagem = "Registro salvo com sucesso";
        } catch (\Exception $objException) {

            $ds_mensagem = $objException->getMessage();
        }

        $arrRetorno['sn_status'] = $sn_status;
        $arrRetorno['ds_mensagem'] = $ds_mensagem;
        $arrRetorno['objeto'] = $objRetorno;

        return new JsonModel($arrRetorno);
    }

    public function questionAction() {

        $quiz_id = $this->params()->fromRoute('id');

        $objTypes = $this->getRepository(\Application\Entidade\TypeQuestion::class)
            ->findAll();

        $arrTypes = [];
        foreach ($objTypes as $objType) {
            $arrTypes[] = $objType->toArray();
        }

        $arrRetorno['id'] = $quiz_id;
        $arrRetorno['arrTypes'] = $arrTypes;
        return new ViewModel($arrRetorno);
    }

    public function saveQuestionAction() {
        $sn_status = false;
        $ds_mensagem = null;
        $objRetorno = null;

        try {
            $quiz_id = $this->params()->fromRoute('id');

            $arrDados = $this->getArrPost();

            $arrDados['quiz_id'] = $quiz_id;

            $this->getRepository(\Application\Entidade\Question::class)
                ->doSave(null, $arrDados);

        } catch (\Exception $objException) {
            $ds_mensagem = $objException->getMessage();
        }

        $arrRetorno['sn_status'] = $sn_status;
        $arrRetorno['ds_mensagem'] = $ds_mensagem;
        $arrRetorno['objeto'] = $objRetorno;

        return new JsonModel($arrRetorno);
    }

    public function loadQuestionAction() {
        $sn_status = false;
        $ds_mensagem = null;
        $objRetorno = null;

        try {
            $quiz_id = $this->params()->fromRoute('id');

            $objQuestions = $this->getRepository(\Application\Entidade\Question::class)
                ->findBy(
                    array(
                        'quiz' => $quiz_id,
                    )
                );

            $arrQuestion = [];

            foreach ($objQuestions as $cd_indice => $objQuestion) {
                $arrQuestion[$cd_indice] = $objQuestion->toArray();

            }

            $arrRetorno['arrQuestion'] = $arrQuestion;
            $sn_status = true;
        } catch (\Exception $objException) {
            $ds_mensagem = $objException->getMessage();
        }

        $arrRetorno['sn_status'] = $sn_status;
        $arrRetorno['ds_mensagem'] = $ds_mensagem;
        $arrRetorno['objeto'] = $objRetorno;

        return new JsonModel($arrRetorno);
    }
}
