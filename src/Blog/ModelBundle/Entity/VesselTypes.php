<?php

class VesselTypes
{
    /**
     * @var Integer
     */
    private $id;
    /**
     * @var String
     */
    private $type;

    /**
     * @var Integer
     */
    private $vesselSubTypeId;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return string
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->$type;
    }

    /**
     * Set vesselSubTypeId
     *
     * @param integer $vesselSubTypeId
     * @return integer
     */
    public function setVesselSubTypeId($vesselSubTypeId)
    {
        $this->vesselSubTypeId = $vesselSubTypeId;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getVesselSubTypeId()
    {
        return $this->$vesselSubTypeId;
    }


}