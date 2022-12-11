import './bootstrap';

import Quill from 'quill';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

var quill = new Quill('#editor', {
  theme: 'snow',
});

Alpine.start();
