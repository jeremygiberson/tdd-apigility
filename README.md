# TDD APIGILITY
Provides a few key gherkin definitions for describing behaviour of REST services.
You can then, using Behat, generate apigility configuration for the described services.

This is a crazy application of Test-Driven-Development, a crazy literal application.

## How it Works
This package is a Behat extension that provides two special contexts that together 
generate and test an Configuration configuration / skeleton. The extension's contexts
define gherkin steps you can use to describe the behavior of a RESTful or RPC endpoint.
 
So as you write the tests for your service, you're also generating the code that powers
that service. Literally, driving your development with tests (TDD).

## Installation
  1. Add tdd-apigility to your composer requirements
  2. Configure namespaces/paths for the extension in `behat.yml` (optional as sane defaults are provided)

### Configuration
You should have two suites defined in your `behat.yml`, one for generating your 
apigility configuration and the other for testing your apigility skeleton. In each
suite you should list either the `Generator` or `Tester` context as well as any
additional contexts you require. Though likely, you will only utilize the `Generator`
context for the generate suite.
 
```
default:
    suites:
        generate:
            contexts:
                - \Giberson\Tdd\Configuration\Context\Generator
        test:
            contexts:
                - FeatureContext
                - \Giberson\Tdd\Configuration\Context\Tester                
    extensions:
        Giberson\Tdd\Configuration\Extension: ~
```

## Usage

  1. Write features describing your REST or RPC service
  2. Run Behat
  3. profit (zf-apigility skeleton is generated & configured)
