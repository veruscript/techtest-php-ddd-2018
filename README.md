Veruscript Technical Test 2018
==============================

The purpose of this test is to establish your understanding of Domain-Driven Design and Command-Query Separation within PHP.

We send these to prospective candidates, however if you happen to have stumbled across this repository and are interested in joining, do contact
us - developers AT veruscript DOT com.

The test is split into two parts, one required and one optional.


Assignment 1 (required) - Designing a manuscript submission library
-----


### Specification ###

 * The flow is very similar to Pull Requests in GitHub.

 * An Author can start work on a new Manuscript _draft_ - Version 0.1.

 * When the Author feels the Manuscript draft is ready, he then would _submit_ it for review.

 * Once in review, the Reviewer SHOULD either _approve_ or _reject_ the Manuscript.

 * If approved, the Manuscript SHOULD be _published_ and Version 1.0 is released.

 * However, if rejected, the Manuscript SHOULD be _revised_ and the author is required to work on the _draft_ revision 0.2.

 * Additionally, the Manuscript CAN be _revised_ by the author even if already approved or published.

 * Each time the Manuscript is _revised_, the minor version is incremented (eg. 1.4 -> 1.5).

 * Each time the Manuscript is _published_, the major version is incremented (eg. 3.4 -> 4.0).


```

 ┌─────────┐              ┌───────────┐               ┌───────────┐               ┌───────────┐
 │  Draft  ╞══ Submit ═══►│ Submitted ╞══ Approve ═══►│ Approved  ╞══ Publish ═══►│ Published │
 └─────────┘              └─────╥─────┘               └───────────┘               └───────────┘
      ▲                         ║
      ║                       Reject
   Revise                       ║
      ║     ┌───────────┐       ║
      ╠═════╡ Rejected  │ ◄═════╝
      ║     └───────────┘
      ║
     ...other states - the author can optionally revise at any time.


```

### Tasks ###

1. We have created `features/manuscript.feature` with scenarios which require passing.

2. We have created a small library under the `lib` directory / `Veruscript\TechTest` namespace that we would like you to integrate with,
   which defines the flow of handling Manuscript submissions. These files are already autoloaded.

   This library contains one exception class and the rest are interfaces. You CANNOT modify any of these classes but you
   are permitted to extend them under the `App` namespace.

3. To get you started, we have provided some code for the `App` namespace in the `src` directory which are free to modify.
   Note that these classes are not yet autoloaded, so you will need to do so.


### Recommendations ###

The following are just recommendations and are not mandatory, but do take them into consideration.


 * We recommend NOT investing more than 2 hours on each assignment.

 * We recommend NOT using full-stack frameworks (Laravel, Zend, Symfony, etc).
  
 * ...but you CAN use Symfony Flex, and maybe Micro-Frameworks (Expressive, Slim, Silex).

 * We DO recommend using components of any frameworks if suitable (Symfony HttpFoundation, Twig, Aura.Di, etc)

 * We DO recommend following any established standards in the PHP community.
 
 * We DO recommend providing logging functionality.

 * We DO recommend providing your own README explaining what you did.

 * You don't have to use an RDS database for storage.

 * If you are able to demonstrate PhpSpec knowledge, please do provide at least one spec class (and make it count).


Assignment 2 (optional) - Providing a user interface
-----

We understand that your time may be limited so the following task is optional.


Based the specification above and using the classes you have designed, we would like you to either:

  __A. Create a console command.__

Or:

  __B. Create a web application.__


The app should allow you to:

 * Create a new manuscript from a form / input. 

 * Edit an existing manuscript from a form / input.

 * Submit a manuscript for review.
 
 * Approve or reject from a list of manuscripts _submitted_.
 
 * Publish a manuscript.

 * Show a list of all _published_ manuscripts.

 * View a single manuscript.


### Recommendations ###

 * For simplicity, you can be both the Author and Reviewer, therefore a User class is not required.

 * Should you choose provide a User class representing the Author and Reviewer,
 Authentication is not required for this assignment, but you are free to implement it.

 * If you choose to create a web application and have good front-end skills,
  we would be keen to see these. (Gulp, JS, Sass, Yarn, etc).
