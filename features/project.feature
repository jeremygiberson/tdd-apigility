Feature: Project Generator
  In order to decouple service building from project management
  As a test writer
  I need my Apigility project to be automatically managed

  Scenario: Starting from scratch
    Given an empty project directory
    When I initialize the project
    Then I should have a working application

  Scenario: Starting with an existing Apigility project
    Given an existing project directory
    When I initialize the project
    Then The existing files should remain intact

  Scenario: Updating an Apigility project
    Given an existing project directory
    And an initial configuration "[]"
    When I patch the configuration with "[]"
    Then the new configuration should match "[]"
