<?php
declare(strict_types=1);
/**
 * Limesharp_Stockists extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category  Limesharp
 * @package   Limesharp_Stockists
 * @copyright 2016 Claudiu Creanga
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * @author    Claudiu Creanga
 */
namespace Limesharp\Stockists\Controller\Adminhtml\Stores;

use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\Session;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Registry;
use Magento\Framework\Stdlib\DateTime\Filter\Date;
use Magento\Framework\View\Result\PageFactory;
use Limesharp\Stockists\Api\StockistRepositoryInterface;
use Limesharp\Stockists\Api\Data\StockistInterface;
use Limesharp\Stockists\Api\Data\StockistInterfaceFactory;
use Limesharp\Stockists\Controller\Adminhtml\Stores as StockistController;
use Limesharp\Stockists\Model\Stores;
use Limesharp\Stockists\Model\ResourceModel\Stores as StockistResourceModel;

class InlineEdit extends StockistController
{
    /**
     * @var DataObjectHelper
     */
    public $dataObjectHelper;
    /**
     * @var DataObjectProcessor
     */
    public $dataObjectProcessor;
    /**
     * @var JsonFactory
     */
    public $jsonFactory;
    /**
     * @var StockistResourceModel
     */
    public $stockistResourceModel;

    /**
     * @param Registry $registry
     * @param StockistRepositoryInterface $stockistRepository
     * @param PageFactory $resultPageFactory
     * @param Date $dateFilter
     * @param Context $context
     * @param DataObjectProcessor $dataObjectProcessor
     * @param DataObjectHelper $dataObjectHelper
     * @param JsonFactory $jsonFactory
     * @param StockistResourceModel $stockistResourceModel
     */
    public function __construct(
        Registry $registry,
        StockistRepositoryInterface $stockistRepository,
        PageFactory $resultPageFactory,
        Date $dateFilter,
        Context $context,
        DataObjectProcessor $dataObjectProcessor,
        DataObjectHelper $dataObjectHelper,
        JsonFactory $jsonFactory,
        StockistResourceModel $stockistResourceModel
    ) {
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->dataObjectHelper    = $dataObjectHelper;
        $this->jsonFactory         = $jsonFactory;
        $this->stockistResourceModel = $stockistResourceModel;
        parent::__construct($registry, $stockistRepository, $resultPageFactory, $dateFilter, $context);
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        $postItems = $this->getRequest()->getParam('items', []);
        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {
            return $resultJson->setData([
                'messages' => [__('Please correct the data sent.')],
                'error' => true,
            ]);
        }

        foreach (array_keys($postItems) as $stockistId) {
            /** @var \Limesharp\Stockists\Model\Stores|StockistInterface $stockist */
            $stockist = $this->stockistRepository->getById((int)$stockistId);
            try {

                $errorInfo = '[Stockist ID: ' . $stockist->getId() . '] check insert value';

                $newStockist=$postItems[$stockistId]; 
                $citt=$newStockist['city'];
                if(!strlen($newStockist['city'])||!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $citt)){
                    $errorInfo=$errorInfo .' City';
                    $error=true;
                }
                $newStockist['postcode']=str_replace(" ","", $newStockist['postcode']);
                if(!strlen($newStockist['postcode'])||!preg_match('/^[A-Z0-9_-]{1,15}$/', $newStockist['postcode'])){
                    $errorInfo=$errorInfo .' PostCode';       
                    $error=true;         
                }
                if(!strlen($newStockist['link'])||!preg_match('/^[a-zA-Z0-9_-]+(?:[\s-][a-zA-Z0-9_-]+)*$/', $citt)){
                    $errorInfo=$errorInfo .' Link';
                    $error=true;
                }

                if(!$error){
                    $newStockist['address']=str_replace(",","", $newStockist['address']);
                    $newStockist['link']=str_replace(" ","", $newStockist['link']);
                    $this->dataObjectHelper->populateWithArray($stockist, $newStockist , StockistInterface::class);
                    $this->stockistResourceModel->saveAttribute($stockist, array_keys($newStockist));
                  
                }             
                else{
                    $messages[]=$errorInfo;
                }
            } catch (LocalizedException $e) {
                $messages[] = $this->getErrorWithStockistId($stockist, $e->getMessage());
                $error = true;
            } catch (\RuntimeException $e) {
                $messages[] = $this->getErrorWithStockistId($stockist, $e->getMessage());
                $error = true;
            } catch (\Exception $e) {
                $messages[] = $this->getErrorWithStockistId(
                    $stockist,
                    __('Check data input.'.$errorInfo)
                );
                $error = true;
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }

    /**
     * Add stockist id to error message
     *
     * @param Stores $stockist
     * @param string $errorText
     * @return string
     */
    public function getErrorWithStockistId(Stores $stockist, $errorText)
    {
        return '[Stockist ID: ' . $stockist->getId() . '] ' . $errorText;
    }
}
