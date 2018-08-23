<?php

namespace App\Clients\Contracts\Models;

use App\Contracts\ResourceInterface;
use App\Countries\Models\Country;
use Illuminate\Support\Collection;

interface ClientInterface extends ResourceInterface
{
    /**
     * Get client type
     *
     * @return int
     */
    public function getType(): int;

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Get code
     *
     * @return string|null
     */
    public function getCode();

    /**
     * Get description
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Get telephone
     *
     * @return string|null
     */
    public function getTelephone();

    /**
     * Get email
     *
     * @return string|null
     */
    public function getEmail();

    /**
     * Get street
     *
     * @return string|null
     */
    public function getStreet();

    /**
     * Get county
     *
     * @return string|null
     */
    public function getCounty();

    /**
     * Get city
     *
     * @return string|null
     */
    public function getCity();

    /**
     * Get email
     *
     * @return string|null
     */
    public function getPostcode();

    /**
     * Get country
     *
     * @return Country|null
     */
    public function getCountry();

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName(string $name);

    /**
     * Set code
     *
     * @param string $code
     */
    public function setCode(string $code);

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription(string $description);

    /**
     * Set telephone
     *
     * @param string $telephone
     */
    public function setTelephone(string $telephone);

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail(string $email);

    /**
     * Set street
     *
     * @param string $street
     */
    public function setStreet(string $street);

    /**
     * Get county
     *
     * @param string $county
     */
    public function setCounty(string $county);

    /**
     * Get city
     *
     * @param string $city
     */
    public function setCity(string $city);

    /**
     * Get email
     *
     * @param string $postcode
     */
    public function setPostcode(string $postcode);

    /**
     * Get country
     *
     * @param Country $country
     */
    public function setCountry(Country $country);
}
