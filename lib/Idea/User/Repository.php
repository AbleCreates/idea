<?php

interface Idea_User_Repository
{

    /**
     *
     *
     * @param string $username
     * @return Idea_User
     */
    public function findForUsername($username);

    /**
     *
     *
     * @param string $emailAddress
     * @return Idea_User
     */
    public function findForEmailAddress($emailAddress);

}