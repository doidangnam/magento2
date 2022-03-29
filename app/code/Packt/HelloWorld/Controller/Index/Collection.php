<?php
namespace Packt\HelloWorld\Controller\Index;

class Collection extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $productCollection = $this->_objectManager
            ->create('Magento\Catalog\Model\ResourceModel\Product\Collection')
            ->addAttributeToSelect(
                [
                    'name',
                    'price',
                    'image',
                ]
            )
            ->addAttributeToFilter('name', array('like' => '%Sport%'));
            // ->addAttributeToFilter('entity_id', array('in' => array(159, 160, 161)));
            // ->addAttributeToFilter('name', 'Overnight Duffle');
            // ->setPageSize(10, 1);

        // Print out query
        // $output = $productCollection->getSelect()->__toString();
        // $this->getResponse()->setBody($output);
        $productCollection->setDataToAll('price', 18);

        $output = '';

        foreach ($productCollection as $product) {
            $output .= print_r($product->debug());
        }

        $this->getResponse()->setBody($output);
    }
}
