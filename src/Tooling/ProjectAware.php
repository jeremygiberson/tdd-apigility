<?php


namespace Giberson\Tdd\Apigility\Tooling;


interface ProjectAware
{
    /**
     * @param Project $project
     * @return mixed
     */
    public function setProject(Project $project);

    /**
     * @return Project
     */
    public function getProject();
}