[![Build Status](https://travis-ci.org/Automattic/books-theme.svg?branch=master)](https://travis-ci.org/Automattic/books-theme)

# books-theme

## Installation

### Requirements

`books-theme` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Quick Start

Clone or download this repository, change its name to something else (like, say, `megatherium-is-awesome`), and then you'll need to do a six-step find and replace on the name in all the templates.

1. Search for `'books-theme'` (inside single quotations) to capture the text domain and replace with: `'megatherium-is-awesome'`.
2. Search for `books-theme_` to capture all the functions names and replace with: `megatherium_is_awesome_`.
3. Search for `Text Domain: books-theme` in `style.css` and replace with: `Text Domain: megatherium-is-awesome`.
4. Search for <code>&nbsp;books-theme</code> (with a space before it) to capture DocBlocks and replace with: <code>&nbsp;Megatherium_is_Awesome</code>.
5. Search for `books-theme-` to capture prefixed handles and replace with: `megatherium-is-awesome-`.
6. Search for `books-theme_` (in uppercase) to capture constants and replace with: `MEGATHERIUM_IS_AWESOME_`.

Then, update the stylesheet header in `style.css`, the links in `footer.php` with your own information and rename `books-theme.pot` from `languages` folder to use the theme's slug. Next, update or delete this readme.

### Setup

To start using all the tools that come with `books-theme` you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

### Available CLI commands

`books-theme` comes packed with CLI commands tailored for WordPress theme development :

- `npm run dev` : watch SCSS archives and JS .
- `npm run build` : Compile and minify CSS and JS.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
