<?php

namespace Pjurk\TestComponent\Controller\Index;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Test implements HttpGetActionInterface
{

    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
      * @var RequestInterface
      */
    private $request;

    public function __construct(PageFactory $pageFactory, RequestInterface $request)
    {
        $this->pageFactory = $pageFactory;
        $this->request = $request;
    }

    public function execute()
    {
        /** @var Page $page */
        $page = $this->pageFactory->create();
        return $page;
    }
}