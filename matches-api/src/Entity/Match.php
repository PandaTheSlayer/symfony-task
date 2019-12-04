<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Table("sport_matches")
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 */
class Match
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="League")
     * @JoinColumn(name="league_id", referencedColumnName="id")
     */
    private $league;

    /**
     * @ORM\ManyToOne(targetEntity="Team")
     * @JoinColumn(name="first_team_id", referencedColumnName="id")
     */
    private $firstTeam;

    /**
     * @ORM\ManyToOne(targetEntity="Team")
     * @JoinColumn(name="second_team_id", referencedColumnName="id")
     */
    private $secondTeam;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $source;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getFirstTeam(): ?string
    {
        return $this->firstTeam;
    }

    public function setFirstTeam(string $firstTeam): self
    {
        $this->firstTeam = $firstTeam;

        return $this;
    }

    public function getSecondTeam(): ?string
    {
        return $this->secondTeam;
    }

    public function setSecondTeam(string $secondTeam): self
    {
        $this->secondTeam = $secondTeam;

        return $this;
    }

    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->startAt;
    }

    public function setStartAt(\DateTimeInterface $startAt): self
    {
        $this->startAt = $startAt;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLeague()
    {
        return $this->league;
    }

    /**
     * @param mixed $league
     */
    public function setLeague($league): void
    {
        $this->league = $league;
    }
}
