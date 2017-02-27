<?php
namespace PortlandLabs\Concrete5\MigrationTool\Entity\Import\AreaLayout;

use PortlandLabs\Concrete5\MigrationTool\Publisher\AreaLayout\PresetAreaLayoutPublisher;

/**
 * @Entity
 */
class PresetAreaLayout extends AreaLayout
{
    /**
     * @Column(type="string")
     */
    protected $preset;

    /**
     * @return mixed
     */
    public function getPreset()
    {
        return $this->preset;
    }

    /**
     * @param mixed $preset
     */
    public function setPreset($preset)
    {
        $this->preset = $preset;
    }

    public function getPublisher()
    {
        return new PresetAreaLayoutPublisher();
    }
}
