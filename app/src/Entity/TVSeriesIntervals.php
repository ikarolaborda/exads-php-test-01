<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

#[Entity]
class TVSeriesIntervals
{
    #[ORM\Id]
    #[ORM\OneToOne(targetEntity: TVSeries::class)]
    private int $id_tv_series;

    #[ORM\Column(type: 'integer')]
    private int $week_day;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeImmutable $show_time;

    /**
     * @return int
     */

    public function getIdTvSeries(): int
    {
        return $this->id_tv_series;
    }


    /**
     * @param int $week_day
     * @return TVSeriesIntervals
     */
    public function setWeekDay(int $week_day): TVSeriesIntervals
    {
        $this->week_day = $week_day;
        return $this;
    }

    /**
     * @return int
     */
    public function getWeekDay(): int
    {
        return $this->week_day;
    }

    /**
     * @param \DateTimeImmutable $show_time
     * @return TVSeriesIntervals
     */
    public function setShowTime(\DateTimeImmutable $show_time): TVSeriesIntervals
    {
        $this->show_time = $show_time;
        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getShowTime(): \DateTimeImmutable
    {
        return $this->show_time;
    }


}