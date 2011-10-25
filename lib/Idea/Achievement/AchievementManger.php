<?php

class AchievementManager
   implements SplObserver
{

   protected $_task;

   protected static $_achievements;

   public function __construct(Task $task)
   {

       $this->_task = $task;

   }

   public function update()
   {

       $this->assertAchievements();

       $user = $this->_task->getCompletedBy();

       // do a diff on all achievements against
       // achievements that the user already
       // has
       $achievements = array();

       foreach ($achievements as $a) {

           if ($a->isAchieved($user, $this->_task)) {
               $a->awardTo($user);
               // remove achievement from
               // iterator?
           }

       }

   }

   protected function _assertAchievements()
   {

       if (is_null(self::$_achievements)) {
           throw new DomainException('Achievements have not been initialized in ' . __CLASS__);
       }

   }

   public static function setAchievements(array $a)
   {

       self::$_achievements = $a;

   }

}
