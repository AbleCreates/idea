<?php

interface Achievement
{

   public function isAchieved(User $u, Task $task);
   public function awardTo(User $u);

}
