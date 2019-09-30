<?php
/**
 * PHP version 7.1
 *
 * @category Models
 * @package  SaaS\Service\Boxberry\Model
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace SaaS\Service\Boxberry\Model\PointsDescription;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations;

/**
 * Class WorkShedule
 *
 * @category Models
 * @package  SaaS\Service\Boxberry\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @Annotations\FakeMock()
 */
trait WorkShedule
{
    /**
     * Расписание работы строкой
     *
     * @var string $workShedule
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkShedule")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workShedule;

    /**
     * Понедельник, начало рабочего дня
     *
     * @var string $workMoBegin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkMoBegin")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workMoBegin;

    /**
     * Понедельник, конец рабочего дня
     *
     * @var string $workMoEnd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkMoEnd")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workMoEnd;

    /**
     * Вторник, начало рабочего дня
     *
     * @var string $workTuBegin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkTuBegin")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workTuBegin;

    /**
     * Вторник, конец рабочего дня
     *
     * @var string $workTuEnd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkTuEnd")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workTuEnd;

    /**
     * Среда, начало рабочего дня
     *
     * @var string $workWeBegin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkWeBegin")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workWeBegin;

    /**
     * Среда, конец рабочего дня
     *
     * @var string $workWeEnd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkWeEnd")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workWeEnd;

    /**
     * Четверг, начало рабочего дня
     *
     * @var string $workThBegin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkThBegin")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workThBegin;

    /**
     * Четверг, конец рабочего дня
     *
     * @var string $workThEnd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkThEnd")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workThEnd;

    /**
     * Пятница, начало рабочего дня
     *
     * @var string $workFrBegin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkFrBegin")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workFrBegin;

    /**
     * Пятница, конец рабочего дня
     *
     * @var string $workFrEnd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkFrEnd")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workFrEnd;

    /**
     * Суббота, начало рабочего дня
     *
     * @var string $workSaBegin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkSaBegin")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workSaBegin;

    /**
     * Суббота, конец рабочего дня
     *
     * @var string $workSaEnd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkSaEnd")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workSaEnd;

    /**
     * Воскресенье, начало рабочего дня
     *
     * @var string $workSuBegin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkSuBegin")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workSuBegin;

    /**
     * Воскресенье, конец рабочего дня
     *
     * @var string $workSuEnd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkSuEnd")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workSuEnd;

    /**
     * Понедельник, обед, начало
     *
     * @var string $lunchMoBegin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LunchMoBegin")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $lunchMoBegin;

    /**
     * Понедельник, обед, конец
     *
     * @var string $lunchMoEnd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LunchMoEnd")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $lunchMoEnd;

    /**
     * Вторник, обед, начало
     *
     * @var string $lunchTuBegin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LunchTuBegin")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $lunchTuBegin;

    /**
     * Вторник, обед, конец
     *
     * @var string $lunchTuEnd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LunchTuEnd")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $lunchTuEnd;

    /**
     * Среда, обед, начало
     *
     * @var string $lunchWeBegin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LunchWeBegin")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $lunchWeBegin;

    /**
     * Среда, обед, конец
     *
     * @var string $lunchWeEnd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LunchWeEnd")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $lunchWeEnd;

    /**
     * Четверг, обед, начало
     *
     * @var string $lunchThBegin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LunchThBegin")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $lunchThBegin;

    /**
     * Четверг, обед, конец
     *
     * @var string $lunchThEnd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LunchThEnd")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $lunchThEnd;

    /**
     * Пятница, обед, начало
     *
     * @var string $lunchFrBegin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LunchFrBegin")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $lunchFrBegin;

    /**
     * Пятница, обед, конец
     *
     * @var string $lunchFrEnd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LunchFrEnd")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $lunchFrEnd;

    /**
     * Суббота, обед, начало
     *
     * @var string $lunchSaBegin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LunchSaBegin")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $lunchSaBegin;

    /**
     * Суббота, обед, конец
     *
     * @var string $lunchSaEnd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LunchSaEnd")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $lunchSaEnd;

    /**
     * Воскресенье, обед, начало
     *
     * @var string $lunchSuBegin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LunchSuBegin")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $lunchSuBegin;

    /**
     * Воскресенье, обед, конец
     *
     * @var string $lunchSuEnd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LunchSuEnd")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $lunchSuEnd;
}
