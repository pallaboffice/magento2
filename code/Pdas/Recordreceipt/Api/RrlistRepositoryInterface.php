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

namespace Pdas\Recordreceipt\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface RrlistRepositoryInterface
{


    /**
     * Save rrlist
     * @param \Pdas\Recordreceipt\Api\Data\RrlistInterface $rrlist
     * @return \Pdas\Recordreceipt\Api\Data\RrlistInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Pdas\Recordreceipt\Api\Data\RrlistInterface $rrlist
    );

    /**
     * Retrieve rrlist
     * @param string $rrlistId
     * @return \Pdas\Recordreceipt\Api\Data\RrlistInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($rrlistId);

    /**
     * Retrieve rrlist matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Pdas\Recordreceipt\Api\Data\RrlistSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete rrlist
     * @param \Pdas\Recordreceipt\Api\Data\RrlistInterface $rrlist
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Pdas\Recordreceipt\Api\Data\RrlistInterface $rrlist
    );

    /**
     * Delete rrlist by ID
     * @param string $rrlistId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($rrlistId);
}
