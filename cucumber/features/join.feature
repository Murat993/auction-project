Feature: View join page

  Scenario: View join page without feature
    Given I am a guest user
    And I do not have "JOIN_TO_US" feature
    When I open "/join" page
    Then I see "Page is not found"

  Scenario: View join page
    Given I am a guest user
    And I have "JOIN_TO_US" feature
    When I open "/join" page
    Then I see "Join to Us" header
    And I see "join-link" element

  Scenario: Click to Join
    Given I am a guest user
    And I have "JOIN_TO_US" feature
    And I am on "/" page
    When I click "join-link" element
    Then I see "Join to Us" header
