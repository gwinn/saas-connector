<?php

namespace RetailCrm\Component;

/**
 * Class FLock
 * @package RetailCrm\Component
 */
class FLock
{

    private $lock = null;
    private $lockfilepath = null;
    private $is_locked = false;

    /**
     * Lock file
     *
     * @param $lock_name
     * @param bool $throw_exception
     * @throws \Exception
     */
    public function __construct($lock_name, $throw_exception = false)
    {
        $this->lockfilepath = "/dev/shm/" . md5($lock_name);
        $this->lock = fopen($this->lockfilepath, "w+");

        if (!$this->lock) {
            $message = "Could not create lock file for writing ";
            throw new \Exception($message . $this->lockfilepath);
        }

        $this->is_locked = flock($this->lock, LOCK_NB + LOCK_EX);

        if ($this->is_locked) {
            ftruncate($this->lock, 0);
            fwrite($this->lock, posix_getpid());
            fflush($this->lock);
        } elseif ($throw_exception) {
            $message = "Could not acquire exclusive lock for ";
            throw new \Exception($message . $lock_name);
        }

    }

    /**
     * Check file is locked
     *
     * @return bool
     */
    public function isLocked()
    {
        return $this->is_locked;
    }

    /**
     * Unlock file
     */
    public function __destruct()
    {
        if ($this->lock  && $this->is_locked) {
            flock($this->lock, LOCK_UN);
            unlink($this->lockfilepath);
        }
    }
}
