<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Validation\Exceptions\ValidationException;
use Config\Services;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        helper('operaciones');
        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
/*Creador por at metodo convertir json*/
    public  function  getRespose(array $responseBody,int $code=ResponseInterface::HTTP_OK){
        return $this->response->setStatusCode($code)->setJSON($responseBody);
    }
    public  function  getRequestInput(IncomingRequest $request){
       $input=$request->getPost();
       if(empty($input)){
           $input=json_encode($request->getBody(),true);
       }
       return $input;
    }
    public  function  validateRequest($input, array $rules,array $mensaje=[]){
       $this->validator=Services::validation()->setRule($rules);
       if(is_string($rules)){
           $validation=config('validation');
           if(!isset($validation->$rules)){
               throw  ValidationException::forRuleNotFound($rules);
           }
           if(!$mensaje){
               $errorName=$rules.'_errors';
               $messages=$validation->$errorName ?? [];
           }
       }
       return $this->validator->setRule($rules,$mensaje)->run($input);
    }
}
