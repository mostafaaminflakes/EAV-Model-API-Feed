## Overview

Fetch and import third party API products and variations with no repetitions into database and implementing Entity-Attribute-Value (EAV) model.

## System Requirements

-   PHP 8.1
-   Composer 2.5.\*
-   Laravel Framework 10

## Features

-   Queues
-   Jobs
-   Commands
-   Chunking
-   Upserts
-   Data Validation

## Usage

-   Clone the repository.

    ```
    $ git clone https://github.com/mostafaaminflakes/EAV-Model-API-Feed.git
    $ cd EAV-Model-API-Feed
    $ composesr install
    ```

-   Create a database and populate the [.env] file with its credentials.
-   Run the following command to install tables inside the database and prepare them for EAV.

    ```
    $ php artisan db:install
    ```

-   Serve.

    ```
    php artisan serve
    ```

-   Queue.

    ```
    $ php artisan queue:listen --queue=json
    ```

-   Run this command to start the import process [and watch the queue window].

    ```
    $ php artisan import:json
    ```

## R&D concepts

While creating this project, the following ideas were R&D:

-   Introduced and implemented [Entity-Attribute-Value model (EAV)](https://en.wikipedia.org/wiki/Entity%E2%80%93attribute%E2%80%93value_model) for modern e-commerce products and variations.
