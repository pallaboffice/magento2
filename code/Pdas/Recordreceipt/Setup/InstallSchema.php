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

namespace Pdas\Recordreceipt\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        $table_pdas_recordreceipt_rrlist = $setup->getConnection()->newTable($setup->getTable('pdas_recordreceipt_rrlist'));

        
        $table_pdas_recordreceipt_rrlist->addColumn(
            'rrlist_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            array('identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,),
            'Entity ID'
        );
        

        
        $table_pdas_recordreceipt_rrlist->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'name'
        );
        

        $setup->getConnection()->createTable($table_pdas_recordreceipt_rrlist);

        $setup->endSetup();
    }
}
