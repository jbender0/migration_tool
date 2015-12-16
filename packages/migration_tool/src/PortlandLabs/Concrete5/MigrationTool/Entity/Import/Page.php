<?php
namespace PortlandLabs\Concrete5\MigrationTool\Entity\Import;

use Doctrine\Common\Collections\ArrayCollection;
use PortlandLabs\Concrete5\MigrationTool\Publisher\PublishableInterface;
use PortlandLabs\Concrete5\MigrationTool\Publisher\Validator\PageValidator;

/**
 * @Entity
 * @Table(name="MigrationImportPages")
 */
class Page implements PublishableInterface
{
    /**
     * @Id @Column(type="guid")
     * @GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $original_path;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $batch_path;

    /**
     * @Column(type="string")
     */
    protected $public_date;

    /**
     * @Column(type="string")
     */
    protected $name;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $filename;

    /**
     * @Column(type="string")
     */
    protected $type;

    /**
     * @Column(type="string")
     */
    protected $template;

    /**
     * @Column(type="string")
     */
    protected $user;

    /**
     * @Column(type="text")
     */
    protected $description;

    /**
     * @Column(type="integer")
     */
    protected $position;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $package;

    /**
     * @Column(type="boolean")
     */
    protected $is_at_root = false;

    /**
     * @OneToMany(targetEntity="\PortlandLabs\Concrete5\MigrationTool\Entity\Import\PageAttribute", mappedBy="page", cascade={"persist", "remove"})
     **/
    public $attributes;

    /**
     * @OneToMany(targetEntity="\PortlandLabs\Concrete5\MigrationTool\Entity\Import\Area", mappedBy="page", cascade={"persist", "remove"})
     * @OrderBy({"name" = "ASC"})
     **/
    public $areas;

    /**
     * @ManyToOne(targetEntity="\PortlandLabs\Concrete5\MigrationTool\Entity\Import\PageObjectCollection")
     **/
    protected $collection;

    /**
     * @var bool
     */
    protected $normalizePath = true;

    /**
     * @return boolean
     */
    public function canNormalizePath()
    {
        return $this->normalizePath;
    }

    /**
     * @param boolean $normalizePath
     */
    public function setNormalizePath($normalizePath)
    {
        $this->normalizePath = $normalizePath;
    }

    public function __construct()
    {
        $this->attributes = new ArrayCollection();
        $this->areas = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getOriginalPath()
    {
        return $this->original_path;
    }

    /**
     * @param mixed $path
     */
    public function setOriginalPath($path)
    {
        $this->original_path = $path;
    }

    /**
     * @return mixed
     */
    public function getBatchPath()
    {
        return $this->batch_path;
    }

    /**
     * @param mixed $batch_path
     */
    public function setBatchPath($batch_path)
    {
        $this->batch_path = $batch_path;
    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param mixed $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return mixed
     */
    public function getPublicDate()
    {
        return $this->public_date;
    }

    /**
     * @param mixed $public_date
     */
    public function setPublicDate($public_date)
    {
        $this->public_date = $public_date;
    }

    /**
     * @return mixed
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @param mixed $collection
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return mixed
     */
    public function getAreas()
    {
        return $this->areas;
    }

    /**
     * @param mixed $areas
     */
    public function setAreas($areas)
    {
        $this->areas = $areas;
    }

    public function getPublisherValidator()
    {
        return new PageValidator($this);
    }

    /**
     * @return mixed
     */
    public function getIsAtRoot()
    {
        return $this->is_at_root;
    }

    /**
     * @param mixed $is_at_root
     */
    public function setIsAtRoot($is_at_root)
    {
        $this->is_at_root = $is_at_root;
    }

    /**
     * @return mixed
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * @param mixed $package
     */
    public function setPackage($package)
    {
        $this->package = $package;
    }
}
