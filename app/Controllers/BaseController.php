<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
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
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    protected $session;


    function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();


    }
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['auth', 'url','form','text','phone','custom_helper'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        session();
        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->produkModel = new \App\Models\ProdukModel();
        $this->wisataModel = new \App\Models\WisataModel();
        $this->artikelModel = new \App\Models\ArtikelModel();
        $this->eventModel = new \App\Models\EventModel();
        $this->usersModel = new \App\Models\UsersModel();
        $this->mediaModel = new \App\Models\MediaModel();
        $this->komentarModel = new \App\Models\KomentarModel();
        $this->kategoriProdukModel = new \App\Models\KategoriProdukModel();
        $this->kategoriWisataModel = new \App\Models\KategoriWisataModel();
        $this->kategoriWisataModel = new \App\Models\KategoriWisataModel();
        $this->kategoriEventModel = new \App\Models\KategoriEventModel();
        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth = service('authentication');
        
    }
}