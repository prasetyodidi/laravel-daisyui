import './bootstrap';

import Alpine from 'alpinejs';

Alpine.store('darkMode', {
    on: localStorage.getItem('theme') ?? false,

    toggle() {
        localStorage.setItem('theme', localStorage.getItem('theme') === 'true' ? 'false' : 'true')
        this.on = localStorage.getItem('theme');
    }
})

window.Alpine = Alpine;

Alpine.start();
