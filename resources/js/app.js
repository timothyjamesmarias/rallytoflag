import './bootstrap';

import "@fortawesome/fontawesome-free/scss/fontawesome.scss";
import "@fortawesome/fontawesome-free/scss/solid.scss";
import "@fortawesome/fontawesome-free/scss/brands.scss";
import "@fortawesome/fontawesome-free/scss/regular.scss";

import Quill from 'quill';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

var quill = new Quill('#editor', {
  theme: 'snow',
});

Alpine.start();
