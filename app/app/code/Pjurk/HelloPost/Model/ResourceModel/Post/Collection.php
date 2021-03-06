<?php
namespace Pjurk\HelloPost\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected $_eventPrefix = 'post_hellopost_post_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Pjurk\HelloPost\Model\Post', 'Pjurk\HelloPost\Model\ResourceModel\Post');
    }

}
