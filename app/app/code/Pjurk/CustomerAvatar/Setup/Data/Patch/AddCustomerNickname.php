<?php
namespace Pjurk\CustomerAvatar\Setup\Data\Patch;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;

class AddCustomerNickname implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var CustomerSetupFactory
     */
    private $customerSetupFactory;

    /**
     * @param ModuleDataSetupInterface $moduleSetup
     * @param CustomerSetupFactory $customerFactory
     */
    public function __construct(ModuleDataSetupInterface $moduleSetup, CustomerSetupFactory $customerFactory)
    {
        $this->moduleDataSetup = $moduleSetup;
        $this->customerSetupFactory = $customerFactory;
    }

    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function apply()
    {
        $customerSetup = $this->customerSetupFactory->create(["setup" => $this->moduleDataSetup]);
    }

    public static function getDependencies()
    {
        return [
            UpdateIdentifierCustomerAttributesVisibility::class,
        ]
    }
}
