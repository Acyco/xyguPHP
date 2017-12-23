<?php

/**
 * File: 08.php
 * User: Joye Chen
 * Date: 2017-12-22
 * Time: 18:23
 */
class user implements SplSubject
{
    public $lognum;
    public $hobby;
    
    protected $observers = null;
    
    public function __construct($hobby)
    {
        $this->lognum = rand(1, 10);
        $this->hobby = $hobby;
        $this->observers=new SplObjectStorage();
    }
    
    public function login()
    {
        $this->notify();
    }
    
    
    /**
     * Attach an SplObserver
     * @link http://php.net/manual/en/splsubject.attach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to attach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function attach(SplObserver $observer)
    {
      $this->observers->attach($observer);
    }
    
    /**jegf
     * Detach an observer
     * @link http://php.net/manual/en/splsubject.detach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to detach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }
    
    /**
     * Notify an observer
     * @link http://php.net/manual/en/splsubject.notify.php
     * @return void
     * @since 5.1.0
     */
    public function notify()
    {
        $this->observers->rewind();
        while($this->observers->valid()){
            $observer = $this->observers->current();
            $observer->update($this);
            $this->observers->next();
        }
    }
}

class secrity implements SplObserver{
    
    /**
     * Receive update from subject
     * @link http://php.net/manual/en/splobserver.update.php
     * @param SplSubject $subject <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function update(SplSubject $subject)
    {
        if($subject->lognum > 3)
        {
            echo "这是第".$subject->lognum."次安全登录";
        }else{
    
            echo "这是第".$subject->lognum."次异常登录";
        }
    }
}

class ad implements SplObserver{
    
    /**
     * Receive update from subject
     * @link http://php.net/manual/en/splobserver.update.php
     * @param SplSubject $subject <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function update(SplSubject $subject)
    {
        if($subject->hobby == "sports"){
            echo "台球广告";
        } else{
            echo "学习";
        }
    }
    
}


$user = new user("sports");

$user->attach(new secrity());
$user->attach(new ad());


$user->login();