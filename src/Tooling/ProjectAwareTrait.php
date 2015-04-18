<?php


namespace Giberson\Tdd\Apigility\Tooling;


trait ProjectAwareTrait
{
    /** @var  Project */
    protected $project;

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     * @return self
     */
    public function setProject(Project $project)
    {
        $this->project = $project;
        return $this;
    }
}