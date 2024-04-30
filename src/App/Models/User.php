<?php
namespace App\Models;

class User
{
    /////////////////Attributs///////////////////////////////
    protected ?int $id;
    protected ?string $username;
    protected ?string $email;
    protected ?string $password;
    private ?int $is_active;
    private ?string $created_at;
    private ?string $updated_at;

///////////////////////////Constructeur///////////////////////////////
    public function __construct($username, $email, $password,$is_active=1)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->is_active = $is_active;
    }
    

/////////////////////////////Getters & Setters///////////////////////////////
    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of is_active
     */
    public function getIsActive(): ?int
    {
        return $this->is_active;
    }

    /**
     * Set the value of is_active
     */
    public function setIsActive(?int $is_active): self
    {
        $this->is_active = $is_active;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     */
    public function setCreatedAt(?string $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     */
    public function setUpdatedAt(?string $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}