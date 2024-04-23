<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $userData = session()->get('userData');
        if (!empty($userData['userId'])) {
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}

?>