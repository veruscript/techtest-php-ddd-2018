Feature: Submitting a manuscript

  Scenario: Drafting a manuscript
    Given there are no manuscripts
    And I start work on a new manuscript named "Stochastic Processes in AI" with the following content:
    """
    This article considers stochastic games as the most generic multi-agent model.
    It presents in detail several algorithms whose purpose is to solve problems which can be
    modeled as stochastic games, even if most of these algorithms can also solve simpler problems.
    The chapter presents the main concepts of classical game theory, such as games in strategic
    form, dynamic games, Nash equilibria and others.
    """
    When I list all manuscripts
    Then there should be 1 manuscript
    And the manuscript is named "Stochastic Processes in AI"
    And the manuscript is currently "drafted"
    And the manuscript version is "0.1"

  Scenario: Revising a manuscript
    Given there are no manuscripts
    And I start work on a new manuscript named "Stochastic Processes in AI" with the following content:
    """
    This article considers stochastic games as the most generic multi-agent model.
    It presents in detail several algorithms whose purpose is to solve problems which can be
    modeled as stochastic games, even if most of these algorithms can also solve simpler problems.
    The chapter presents the main concepts of classical game theory, such as games in strategic
    form, dynamic games, Nash equilibria and others.
    """
    When I submit the manuscript
    And the manuscript is rejected
    And I revise the manuscript
    Then the manuscript is currently "drafted"
    And the manuscript version is "0.2"

  Scenario: Publishing a manuscript
    Given there are the following manuscripts:
      | name                                       | status    | content                                                                         |
      | Stochastic Processes in AI                 | drafted   | This article considers stochastic games as the most generic multi-agent model.  |
      | Quantum Computing Threat to Cyber Security | submitted | Digital data is currently protected by cryptography of factoring large numbers. |
    When I approve "Quantum Computing Threat to Cyber Security"
    Then I can proceed to publish "Quantum Computing Threat to Cyber Security"
    Then the manuscript named "Quantum Computing Threat to Cyber Security" is now "published"
    Then the manuscript named "Quantum Computing Threat to Cyber Security" version is "1.0"
    And I cannot publish "Stochastic Processes in AI"
    And the manuscript named "Stochastic Processes in AI" is still being "drafted"

  Scenario: Rejecting a manuscript
    Given there are the following manuscripts:
      | name                                       | status   | content                                                                         |
      | Stochastic Processes in AI                 | submitted | This article considers stochastic games as the most generic multi-agent model.  |
      | Quantum Computing Threat to Cyber Security | submitted | Digital data is currently protected by cryptography of factoring large numbers. |
    When I reject "Quantum Computing Threat to Cyber Security"
    Then the manuscript named "Quantum Computing Threat to Cyber Security" is now "rejected"
    And I cannot publish "Quantum Computing Threat to Cyber Security"
