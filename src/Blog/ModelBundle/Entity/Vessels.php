<?php

/**
 * Class Vessels
 */

class Vessels
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $commandType;

    /**
     * @var string
     */
    private $location;

    /**
     * @var boolean
     */
    private $medicalUnit;

    /**
     * @var ineger
     */
    private $vesselTypeId;


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
     * Set title
     *
     * @param string $title
     * @return string
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set commandType
     *
     * @param string $commandType
     * @return String
     */
    public function setCommandType($commandType)
    {
        $this->commandType = $commandType;

        return $this;
    }

    /**
     * Get commandType
     *
     * @return string
     */
    public function getCommandType()
    {
        return $this->commandType;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return String
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->$location;
    }

    /**
     * Set medicalUnit
     *
     * @param string $medicalUnit
     * @return String
     */
    public function setMedicalUnit($medicalUnit)
    {
        $this->medicalUnit = $medicalUnit;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getMedicalUnit()
    {
        return $this->$medicalUnit;
    }



    /**
     * Set medicalUnit
     *
     * @param string $vesselTypeId
     * @return Integer
     */
    public function setVesselTypeId($vesselTypeId)
    {
        $this->vesselTypeId = $vesselTypeId;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getVesselTypeId()
    {
        return $this->$vesselTypeId;
    }



}
