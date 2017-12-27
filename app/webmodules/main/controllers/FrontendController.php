<?php
namespace App\Modules\Main\Controllers;

use Phalcon\Mvc\Controller;

/**
 *
 */
class FrontendController extends Controller
{
    /**
     *
     */
    public function indexAction()
    {
        $this->view->test = 'abc';

        // return __METHOD__;
    }

    /**
     *
     */
    public function otherAction()
    {
        return __METHOD__;
    }

}
