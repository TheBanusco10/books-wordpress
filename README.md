# books-wordpress

## Wordpress plugin

Create Books and show them on the website. View title, description and comments.

Shortcode:

`[books]`

## Some usages

### Working with styles

If you want to create or modify some stylesheet, you can use sass command to work with .scss files:

- Install [Node.js](https://nodejs.org/es/) and [Sass](https://sass-lang.com/install)
- Create a .scss file in src/scss → test_style.scss
- Use sass --watch command to build css file:
``
sass --watch src/scss/test_style.scss src/css/test_style.css  
``
- Import css file on the website using wp_enqueue_style
