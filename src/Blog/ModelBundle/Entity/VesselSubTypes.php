<?php

class VesselSubTypes
{
    /**
     * @var Integer
     */
    private $id;
    /**
     * @var String
     */
    private $subType;

    /**
     * @var Integer
     */
    private $noOfCannons;

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
     * Set subtype
     *
     * @param string $subType
     * @return string
     */
    public function setSubType($subType)
    {
        $this->subType = $subType;

        return $this;
    }

    /**
     * Get subType
     *
     * @return string
     */
    public function getSubType()
    {
        return $this->$subType;
    }


    /**
     * Set noOfCannons
     *
     * @param string $noOfCannons
     * @return string
     */
    public function setNoOfCannons($noOfCannons)
    {
        $this->noOfCannons = $noOfCannons;

        return $this;
    }

    /**
     * Get subType
     *
     * @return string
     */
    public function getNoOfCannons()
    {
        return $this->$noOfCannons;
    }
}