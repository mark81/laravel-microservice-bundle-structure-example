<?php

namespace App\Clients\Models;

use App\Models\Model;
use App\Clients\Contracts\Models\ClientInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Container\Container;
use Illuminate\Support\Collection;

class Client extends Model implements ClientInterface
{
    use SoftDeletes;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'type_id',
        'code',
        'description',
        'telephone',
        'email',
        'street',
        'county',
        'city',
        'postcode'
    ];

    /**
     * Departments relationship
     *
     * @return HasMany
     */
    public function departments(): HasMany
    {
        return $this->hasMany(Department::class, 'client_id', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): int
    {
        return $this->type_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * {@inheritdoc}
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * {@inheritdoc}
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * {@inheritdoc}
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    /**
     * {@inheritdoc}
     */
    public function setCounty(string $county)
    {
        $this->county = $county;
    }

    /**
     * {@inheritdoc}
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * {@inheritdoc}
     */
    public function setPostcode(string $postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * {@inheritdoc}
     */
    public function setCountry(Country $country)
    {
        $this->country = $country->getCode();
    }

    public function setCountryRepository(CountryRepositoryInterface $repository)
    {
        $this->countryRepository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * {@inheritdoc}
     */
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * {@inheritdoc}
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
}
