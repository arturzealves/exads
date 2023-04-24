<?php

class TvSeries
{
    private $id;
    private $title;
    private $channel;
    private $gender;
    private $showTimes;

    public function __construct($id, $title, $channel, $gender, $showTimes)
    {
        $this->id = $id;
        $this->title = $title;
        $this->channel = $channel;
        $this->gender = $gender;
        $this->showTimes = $showTimes;
    }

    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param DateTime $dateTime
     *
     * @return array
     */
    public function getNextShow(DateTime $dateTime): array
    {
        // Get the day of the week
        $weekDay = $dateTime->format('N');

        $showWeekDay = null;
        foreach ($this->showTimes as $showTime) {
            if ($showTime['week_day'] == $weekDay) {
                $showWeekDay = $weekDay;
                break;
            }
        }
        if ($showWeekDay === null) {
            $showWeekDay = $this->showTimes[0]['week_day'];
        }

        $nextShowDateTime = clone $dateTime;
        while ($nextShowDateTime->format('N') != $showWeekDay) {
            $nextShowDateTime->modify('+1 day');
        }
        [$hours, $minutes, $seconds] = explode(':', $this->showTimes[0]['show_time']);
        $nextShowDateTime->setTime($hours, $minutes, $seconds);

        if ($nextShowDateTime > $dateTime) {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'channel' => $this->channel,
                'gender' => $this->gender,
                'show_time' => $nextShowDateTime->format('Y-m-d H:i:s'),
            ];
        }

        return [];
    }
}
