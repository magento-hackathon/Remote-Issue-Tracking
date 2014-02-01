<?php

class Magehack_RemoteLogger_Model_Data_Object extends Varien_Object
{


    const PRIORITY_TRIVIAL = 'trivial';

    const PRIORITY_MINOR = 'minor';

    const PRIORITY_MAJOR = 'major';

    const PRIORITY_CRITICAL = 'critical';

    const PRIORITY_BLOCKER = 'blocker';

    protected $title = '';

    protected $content = '';

    protected $priority = self::PRIORITY_MAJOR;

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}