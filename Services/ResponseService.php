<?php
namespace SoftUni\Services;

use SoftUni\Core\MVC\MVCContextInterface;

class ResponseService implements ResponseServiceInterface
{
    private $mvcContext;
    const ERROR_PAGE = "errors/404.html";

    public function __construct(MVCContextInterface $MVCContext)
    {
        $this->mvcContext = $MVCContext;
    }

    public function redirect($controller, $action, array $params = [])
    {
        $url = $this->mvcContext->getURIJunk()
            . $controller
            . DIRECTORY_SEPARATOR
            . $action;

        if (!empty($params)) {
            $url .= DIRECTORY_SEPARATOR
                . implode(DIRECTORY_SEPARATOR, $params);
        }

        header("Location: $url");
        exit;
    }

    public function redirect_static($static_page = ERROR_PAGE){

        $url = $this->mvcContext->getURIJunk().$static_page;
        header("Location: $url");
        exit;
    }


}