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

namespace Limesharp\Stockists\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.Generic.CodeAnalysis.UnusedFunctionParameter)
     */

    // @codingStandardsIgnoreStart
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if ($installer->tableExists('limesharp_stockists_stores')) {
            $table = $installer->getTable('limesharp_stockists_stores');
            $connection = $installer->getConnection();
            if (version_compare($context->getVersion(), '2.0.0') != 0) {
               $connection->addColumn(
                    $table,
                    'schedule',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Schedule'
                    ]
                );
                $connection->addColumn(
                    $table,
                    'schedule_monday',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Schedule'
                    ]
                );
                $connection->addColumn(
                    $table,
                    'schedule_tuesday',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Schedule'
                    ]
                );
                $connection->addColumn(
                    $table,
                    'schedule_wednesday',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Schedule'
                    ]
                );
                $connection->addColumn(
                    $table,
                    'schedule_thursday',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Schedule'
                    ]
                );

                $connection->addColumn(
                    $table,
                    'schedule_friday',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Schedule'
                    ]
                );
                $connection->addColumn(
                    $table,
                    'schedule_saturday',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Schedule'
                    ]
                );
                $connection->addColumn(
                    $table,
                    'schedule_sunday',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Schedule'
                    ]
                );
                $connection->addColumn(
                    $table,
                    'station',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Nearest Station'
                    ]
                );
                $connection->addColumn(
                    $table,
                    'description',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Description'
                    ]
                );
                $connection->addColumn(
                    $table,
                    'intro',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Intro'
                    ]
                );

                $connection->addColumn(
                    $table,
                    'distance',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Distance'
                    ]
                );
                $connection->addColumn(
                    $table,
                    'external_link',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'External Link'
                    ]
                );
                $connection->addColumn(
                    $table,
                    'priority',
                    [
                        'type' => Table::TYPE_INTEGER,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Priority Attribute'
                    ]              
                );
                $connection->addColumn(
                    $table,
                    'influential',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Influential Attribute'
                    ]                
                );
                $connection->addColumn(
                    $table,
                    'promoted',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Promoted Attribute'
                    ]                
                );

                if ($connection->tableColumnExists($table, 'second_image') == true){
                    $connection->changeColumn(
                        $table,
                        'second_image',
                        'left_image',
                        [
                            'type' => Table::TYPE_TEXT,
                            'length' => 255,
                            'nullable' => true,
                            'comment' => 'Left Image'
                        ]
                    );
                }
                else{
                    $connection->addColumn(
                        $table,
                        'left_image',
                        [
                            'type' => Table::TYPE_TEXT,
                            'length' => 255,
                            'nullable' => true,
                            'comment' => 'Left Image'
                        ]
                    );
                }
                if ($connection->tableColumnExists($table, 'details_image') == true){
                    $connection->changeColumn(
                        $table,
                        'details_image',
                        'right_image',
                        [
                            'type' => Table::TYPE_TEXT,
                            'length' => 255,
                            'nullable' => true,
                            'comment' => 'Right Image'
                        ]
                    );
                }
                else{
                    $connection->addColumn(
                        $table,
                        'right_image',
                        [
                            'type' => Table::TYPE_TEXT,
                            'length' => 255,
                            'nullable' => true,
                            'comment' => 'Right Image'
                        ]
                    );
                }

                $connection->changeColumn(
                    $table,
                    'image',
                    'header_image',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Header Image'
                    ]
                );
            }
            $installer->endSetup();
        }
        
    }
}
