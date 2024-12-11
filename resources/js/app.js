import './bootstrap';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.css';
import 'tom-select';
import TomSelect from 'tom-select';
import 'tom-select/dist/css/tom-select.bootstrap5.min.css';
import 'tom-select/dist/js/tom-select.complete';

document.addEventListener('DOMContentLoaded', function() {
    var settings = {
        plugins: {remove_button: {title: 'Supprimer'}}
    };
    var selectElements = document.querySelectorAll('select[multiple]');
    selectElements.forEach(function(selectElement) {
        new TomSelect(selectElement, settings);
    });
});
