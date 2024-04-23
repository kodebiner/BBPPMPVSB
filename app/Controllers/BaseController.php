<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Tatter\Visits\Models\VisitModel;


use CodeIgniter\Shield\Entities\User;

use App\Models\UsersModel;

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
    protected $helpers = [
        'auth',
        'auth_helpers',
    ];

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
        $session = \Config\Services::session();
        $this->agent = $this->request->getUserAgent();
        $this->uri = $this->request->uri;

        // Calling Model
        $VisitModel     = new VisitModel();

        // Login Check
        $auth = service('authentication');

        // Get Accurate Date
        date_default_timezone_set('Asia/Jakarta');

        // Populating Data
        $dailyvisit     = $VisitModel->where('updated_at <', date('Y-m-d 23:59:59'))->where('updated_at >', date('Y-m-d 00:00:00'))->find();
        $monthlyvisit   = $VisitModel->where('updated_at <', date('Y-m-t 23:59:59'))->where('updated_at >', date('Y-m-1 00:00:00'))->find();

        // Parsing View Data
        $this->data = [
            'ismobile'      => $this->agent->isMobile(),
            'uri'           => $this->uri,
            'authorize'     => service('authorization'),
            'uid'           => auth()->id(),
            'dailyvisit'    => count($dailyvisit),
            'monthlyvisit'  => count($monthlyvisit),
        ];
    }
}
