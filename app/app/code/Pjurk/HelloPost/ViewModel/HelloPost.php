<?php
namespace Pjurk\HelloPost\ViewModel;


class HelloPost implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    private $postFactory;

    public function __construct(
    \Pjurk\HelloPost\Model\PostFactory $postFactory
    ) {
        $this->postFactory = $postFactory;
    }

    public function getTitle()
    {
        return "Hello Post!";
    }

    public function getPosts()
    {
        $post = $this->postFactory->create();
        return $post->getCollection();

    }
}
