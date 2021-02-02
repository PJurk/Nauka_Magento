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
     * @var Magento\Eav\Api\AttributeRepository
     */
    private $attributeRepository;

    /**
     * @param ModuleDataSetupInterface $moduleSetup
     * @param CustomerSetupFactory $customerFactory
     * @param CustomerSetupFactory $attributeRepository
     */
    public function __construct(
        ModuleDataSetupInterface $moduleSetup,
        CustomerSetupFactory $customerFactory,
        \Magento\Eav\Api\AttributeRepository $attributeRepository
    ) {
        $this->moduleDataSetup = $moduleSetup;
        $this->customerSetupFactory = $customerFactory;
        $this->attributeRepository = $attributeRepository;
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
        $customerSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'profile_image',
            [
                'type' => 'text',
                'label' => 'Customer File/Image',
                'input' => 'file',
                'source' => '',
                'required' => false,
                'visible' => true,
                'position' => 200,
                'system' => false,
                'backend' => ''
            ]
        );

        $attribute = $customerSetup->getEavConfig()
            ->getAttribute(\Magento\Customer\Model\Customer::ENTITY, 'profile_image')
            ->addData(
                ['used_in_forms' => [
                    'adminhtml_customer',
                    'adminhtml_checkout',
                    'customer_account_create',
                    'customer_account_edit'
                    ]
                ]
            );
        
        $this->attributeRepository->save($attribute);
    }

    public static function getDependencies()
    {
        return [
            UpdateIdentifierCustomerAttributesVisibility::class,
        ];
    }
}
