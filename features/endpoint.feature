Feature: Endpoint steps
  In order to describe REST or RPC endpoints
  As a test writer
  I need a gherkin step(s) to define an endpoint

  Scenario: defining an endpoint
    Given a REST endpoint "admin/user"
    Then configuration will contain "router/routes/admin_user"
    And configuration will contain "zf-rest/admin_user\Controller"

  Scenario: defining and endpoint restricting allowed methods
    Given a REST endpoint "admin/user"
    And a POST request is not allowed
    And UPDATE collection request is not allowed
    Then configuration will contain "router/routes/admin_user"
    And configuration will contain "zf-rest/admin_user\Controller"
    And configuration "zf-rest/admin_user\Controller/entity_http_methods" will not contain "POST"
    And configuration "zf-rest/admin_user\Controller/collection_http_methods" will not contain "UPDATE"