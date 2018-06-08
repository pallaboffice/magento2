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

use Pdas\Recordreceipt\Api\Data\RrlistInterface;

class Rrlist extends \Magento\Framework\Model\AbstractModel implements RrlistInterface
{

    protected $_eventPrefix = 'pdas_recordreceipt_rrlist';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Pdas\Recordreceipt\Model\ResourceModel\Rrlist');
    }

    /**
     * Get rrlist_id
     * @return string
     */
    public function getRrlistId()
    {
        return $this->getData(self::RRLIST_ID);
    }

    /**
     * Set rrlist_id
     * @param string $rrlistId
     * @return \Pdas\Recordreceipt\Api\Data\RrlistInterface
     */
    public function setRrlistId($rrlistId)
    {
        return $this->setData(self::RRLIST_ID, $rrlistId);
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Pdas\Recordreceipt\Api\Data\RrlistInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }
}
