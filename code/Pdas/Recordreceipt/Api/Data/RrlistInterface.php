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

interface RrlistInterface
{

    const RRLIST_ID = 'rrlist_id';
    const NAME = 'name';


    /**
     * Get rrlist_id
     * @return string|null
     */
    public function getRrlistId();

    /**
     * Set rrlist_id
     * @param string $rrlistId
     * @return \Pdas\Recordreceipt\Api\Data\RrlistInterface
     */
    public function setRrlistId($rrlistId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Pdas\Recordreceipt\Api\Data\RrlistInterface
     */
    public function setName($name);
}
