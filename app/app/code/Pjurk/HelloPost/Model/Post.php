<?php
namespace PJurk\HelloPost\Model;

class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'pjurk_hellopost_post';

	protected $_cacheTag = 'pjurk_hellopost_post';

	protected $_eventPrefix = 'pjurk_hellopost_post';

	protected function _construct()
	{
		$this->_init('PJurk\HelloPost\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}