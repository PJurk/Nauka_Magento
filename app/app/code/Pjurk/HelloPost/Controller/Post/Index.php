<?php

namespace Pjurk\HelloPost\Controller\Post;
use \Magento\Framework\App\Action\HttpGetActionInterface;
use \Magento\Framework\App\RequestInterface;
use \Magento\Framework\View\Result\Page;
use \Magento\Framework\View\Result\PageFactory;
use \Pjurk\HelloPost\Model\PostFactory;
class Index implements HttpGetActionInterface
{

    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var PostFactory
     */
    protected $postFactory;

    /**
     * @var RequestInterface
     */
    private $request;

    public function __construct(PageFactory $pageFactory, RequestInterface $request, PostFactory $postFactory)
    {
        $this->pageFactory  = $pageFactory;
        $this->postFactory  = $postFactory;
        $this->request      = $request;
    }

    public function execute()
    {
        $post = $this->postFactory->create();
        $collection = $post->getCollection();
        return $this->pageFactory->create();
    }
}
