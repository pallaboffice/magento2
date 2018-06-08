<?php
/**
 * Created by pallab das , pallab.office@gmail.com
 * Copyright (C) 2017  2018
 * 
 * This file included in Pdas/Recordreceipt is licensed under OSL 3.0
 * 
 * http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * Please see LICENSE.txt for the full text of the OSL 3.0 license
 */

namespace Pdas\Recordreceipt\Model;

use Pdas\Recordreceipt\Api\RrlistRepositoryInterface;
use Pdas\Recordreceipt\Api\Data\RrlistSearchResultsInterfaceFactory;
use Pdas\Recordreceipt\Api\Data\RrlistInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Pdas\Recordreceipt\Model\ResourceModel\Rrlist as ResourceRrlist;
use Pdas\Recordreceipt\Model\ResourceModel\Rrlist\CollectionFactory as RrlistCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class RrlistRepository implements rrlistRepositoryInterface
{

    protected $resource;

    protected $rrlistFactory;

    protected $rrlistCollectionFactory;

    protected $searchResultsFactory;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $dataRrlistFactory;

    private $storeManager;


    /**
     * @param ResourceRrlist $resource
     * @param RrlistFactory $rrlistFactory
     * @param RrlistInterfaceFactory $dataRrlistFactory
     * @param RrlistCollectionFactory $rrlistCollectionFactory
     * @param RrlistSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceRrlist $resource,
        RrlistFactory $rrlistFactory,
        RrlistInterfaceFactory $dataRrlistFactory,
        RrlistCollectionFactory $rrlistCollectionFactory,
        RrlistSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->rrlistFactory = $rrlistFactory;
        $this->rrlistCollectionFactory = $rrlistCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataRrlistFactory = $dataRrlistFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Pdas\Recordreceipt\Api\Data\RrlistInterface $rrlist
    ) {
        /* if (empty($rrlist->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $rrlist->setStoreId($storeId);
        } */
        try {
            $rrlist->getResource()->save($rrlist);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the rrlist: %1',
                $exception->getMessage()
            ));
        }
        return $rrlist;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($rrlistId)
    {
        $rrlist = $this->rrlistFactory->create();
        $rrlist->getResource()->load($rrlist, $rrlistId);
        if (!$rrlist->getId()) {
            throw new NoSuchEntityException(__('rrlist with id "%1" does not exist.', $rrlistId));
        }
        return $rrlist;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->rrlistCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            $fields = [];
            $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $fields[] = $filter->getField();
                $condition = $filter->getConditionType() ?: 'eq';
                $conditions[] = [$condition => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
        
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Pdas\Recordreceipt\Api\Data\RrlistInterface $rrlist
    ) {
        try {
            $rrlist->getResource()->delete($rrlist);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the rrlist: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($rrlistId)
    {
        return $this->delete($this->getById($rrlistId));
    }
}
