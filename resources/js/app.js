import './bootstrap';

import "@fortawesome/fontawesome-free/scss/fontawesome.scss";
import "@fortawesome/fontawesome-free/scss/solid.scss";
import "@fortawesome/fontawesome-free/scss/brands.scss";
import "@fortawesome/fontawesome-free/scss/regular.scss";

import Quill from 'quill';
import Alpine from 'alpinejs';
import PhotoSwipeLightbox from 'photoswipe/lightbox';
import 'photoswipe/style.css';

window.Alpine = Alpine;

const lightbox = new PhotoSwipeLightbox({
  gallery: '#my-gallery',
  children: 'a',
  pswpModule: () => import('photoswipe')
});

lightbox.init();
var quill = new Quill('#editor', {
  theme: 'snow',
});

Alpine.start();
