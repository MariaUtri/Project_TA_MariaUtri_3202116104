<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

// use Models
use App\Models\StatPengunjungModel;
use App\Models\SosmedModel;
use App\Models\KontakModel;
use App\Models\KomponenModel;
use App\Models\GambarJasaModel;
use App\Models\JasaModel;
use App\Models\KerjasamaModel;
use App\Models\GaleriModel;
use App\Models\ProdukModel;
use App\Models\KatProdukModel;
use App\Models\ProfilPerusahaanModel;
use App\Models\PenggunaModel;

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

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    // my models
    protected $StatPengunjungModel;
    protected $SosmedModel;
    protected $KontakModel;
    protected $KomponenModel;
    protected $GambarJasaModel;
    protected $JasaModel;
    protected $KerjasamaModel;
    protected $GaleriModel;
    protected $ProdukModel;
    protected $KatProdukModel;
    protected $ProfilPerusahaanModel;
    protected $PenggunaModel;


    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();

        // my model
        $this->SosmedModel = new SosmedModel();
        $this->KontakModel = new KontakModel();
        $this->KomponenModel = new KomponenModel();
        $this->GambarJasaModel = new GambarJasaModel();
        $this->JasaModel = new JasaModel();
        $this->KerjasamaModel = new KerjasamaModel();
        $this->GaleriModel = new GaleriModel();
        $this->ProdukModel = new ProdukModel();
        $this->KatProdukModel = new KatProdukModel();
        $this->ProfilPerusahaanModel = new ProfilPerusahaanModel();
        $this->PenggunaModel = new PenggunaModel();
        $this->StatPengunjungModel = new StatPengunjungModel();
    }
}
