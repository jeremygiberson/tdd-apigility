<?php


namespace Giberson\Tdd\Apigility\Tooling;


class ProjectStructure
{
    /** @var  string */
    protected $application_path;

    protected $structure = [
        'config' => [
            'autoload'
        ],
        'public'
    ];

    public function createIfNotExists()
    {
        // todo
    }

    /**
     * @return string
     */
    public function getApplicationPath()
    {
        return $this->application_path;
    }

    /**
     * @param string $application_path
     * @return self
     */
    public function setApplicationPath($application_path)
    {
        $this->application_path = $application_path;
        return $this;
    }


}