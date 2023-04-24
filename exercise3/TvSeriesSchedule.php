<?php

class TvSeriesSchedule
{
    private $tvSeriesList = [];

    /**
     * @param TvSeries $tvSeries
     */
    public function addTvSeries(TvSeries $tvSeries): void
    {
        $this->tvSeriesList[] = $tvSeries;
    }

    /**
     * @param DateTime $dateTime
     * @param string   $titleFilter
     *
     * @return array
     */
    public function getNextShow(DateTime $dateTime, $titleFilter = ''): ?array
    {
        $result = [];
        foreach ($this->tvSeriesList as $tvSeries) {
            if ($titleFilter === '' || $titleFilter === $tvSeries->getTitle()) {
                $nextShow = $tvSeries->getNextShow($dateTime);

                if ($nextShow !== null) {
                    $result[] = $nextShow;
                }
            }
        }

        usort($result, function ($a, $b) {
            return strtotime($a['show_time']) - strtotime($b['show_time']);
        });

        return $result;
    }
}
