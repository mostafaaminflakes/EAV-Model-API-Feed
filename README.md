## Overview

Import third party API products with variations into database using EAV models with no repetitions.

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

## Usage

-   Clone the repository.

    ```
    $ git clone https://github.com/SallaChallenges/Laravel-Challange-mostafaaminflakes-7091.git
    $ cd Laravel-Challange-mostafaaminflakes-7091/src
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

-   Introduced and implemented Entity-Attribute-Value model (EAV) for modern e-commerce products and variations.
