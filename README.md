## Laravel Notebook

Laravel Notebook is a self-hosted app to manage personal notebooks using Markdown, with full support for the Commonmark and GitHub Flavored Markdown specs, built with Tailwind, Alpine.js, Laravel and Livewire.

---

## Features

-   Create notebooks to group related pages
-   Create pages for a notebook using Markdown, with full support for Commonmark and GitHub Flavored Markdown
-   Syntax highlighting for code blocks via Shiki
-   Support for ==marker highlighting==
-   Heading permalinks & automatic table of contents
-   Support for footnote linking

---

## Roadmap

> :warning: This project is still in development and may introduce breaking changes

-   [ ] Live demo
-   [ ] Shareable notebooks and pages

    -   [ ] Ability to specify which pages should be visible in this shareable link
    -   [ ] Ability to share individual pages without exposing the parent notebook

-   [ ] Notebook passcodes with intervals
-   [ ] Notebook and page archiving
-   [ ] Notebook and page bookmarking
-   [ ] Soft deleting for notebooks and pages, including a 30-day grace period
-   [ ] Javascript code editor for a better editing experience
-   [ ] Filtering for notebooks and pages
-   [ ] Dark theme support
-   [ ] Additional customization for rendered pages

---

## Installation

> Laravel Notebook was built on `PHP 8.1.7` and `Laravel 9.37.0`.

1. Clone the repo

    ```sh
    git clone https://github.com/itsmeslof/notebook.git
    ```

2. Install Composer packages

    ```sh
    composer install
    ```

3. Install NPM packages

    ```sh
    npm install
    ```

4. Build resources

    ```sh
    npm run build
    ```

5. Configure your `.env` file

    > :warning: Don't forget to configure your mail server for user registration and account verification and recovery actions

6. Run migrations

    ```sh
    php artisan migrate --force
    ```

7. Run the setup command

    ```sh
    php artisan notebook:setup
    ```

After running the setup command, you can login with the default credentials:

| Email             | Password |
| ----------------- | -------- |
| admin@example.com | password |

**:warning: You should change the default credentials immediately**

If you need to reset the default admin account credentials, run

```sh
php artisan notebook:reset-admin
```

> The default settings include user registration **disabled**, and the project home page **enabled**. You can change these settings in the admin area.

---

## License

Laravel Notebook is licensed under the [MIT license](LICENSE.txt).
