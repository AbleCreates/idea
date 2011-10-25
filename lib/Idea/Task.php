<?php

interface Task extends SplSubject
{

   public function complete(User $u);
   public function getCompletedBy();

}
