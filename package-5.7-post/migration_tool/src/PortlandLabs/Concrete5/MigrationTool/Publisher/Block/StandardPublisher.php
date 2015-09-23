<?php

namespace PortlandLabs\Concrete5\MigrationTool\Publisher\Block;


use PortlandLabs\Concrete5\MigrationTool\Entity\Import\Area;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\BlockValue;
use Concrete\Core\Page\Page;
use Concrete\Core\Block\BlockType\BlockType;

defined('C5_EXECUTE') or die("Access Denied.");

class StandardPublisher implements PublisherInterface
{

    public function publish(BlockType $bt, Page $page, Area $area, BlockValue $value)
    {
        $data = $value->getData();
        $page->addBlock($bt, $area->getName(), $data);
    }

}
