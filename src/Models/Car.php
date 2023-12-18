<?php

namespace Mviot\GetsionAutomobile\Models;

class Car
{
    /**
     * @param string $brand
     * @param string $model
     * @param string $idnum
     * @param string $gas
     * @param float $price
     * @param string $isNew
     * @param string $isReserved
     */
    public function __construct(
        private string $brand,
        private string $model,
        private string $idnum,
        private string $gas,
        private float $price,
        private string $isNew,
        private string $isReserved,
    )
    {

    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return void
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     * @return void
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getIdnum(): string
    {
        return $this->idnum;
    }

    /**
     * @param string $idnum
     * @return void
     */
    public function setIdnum(string $idnum): void
    {
        $this->idnum = $idnum;
    }

    /**
     * @return string
     */
    public function getIsReserved(): string
    {
        return $this->isReserved;
    }

    /**
     * @param string $isReserved
     * @return void
     */
    public function setIsReserved(string $isReserved): void
    {
        $this->isReserved = $isReserved;
    }

    /**
     * @return string
     */
    public function getIsNew(): string
    {
        return $this->isNew;
    }

    /**
     * @param string $isNew
     * @return void
     */
    public function setIsNew(string $isNew): void
    {
        $this->isNew = $isNew;
    }

    /**
     * @return string
     */
    public function getGas(): string
    {
        return $this->gas;
    }

    /**
     * @param string $gas
     * @return void
     */
    public function setGas(string $gas): void
    {
        $this->gas = $gas;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }
}
