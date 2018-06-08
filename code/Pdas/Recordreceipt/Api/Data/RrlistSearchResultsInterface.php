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

namespace Pdas\Recordreceipt\Api\Data;

interface RrlistSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{


    /**
     * Get rrlist list.
     * @return \Pdas\Recordreceipt\Api\Data\RrlistInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Pdas\Recordreceipt\Api\Data\RrlistInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
