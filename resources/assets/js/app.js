
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import CodeMirror from 'codemirror';
import 'codemirror/mode/javascript/javascript';
import {JSHINT} from 'jshint'; window.JSHINT = JSHINT;
import 'codemirror/addon/lint/lint';
import 'codemirror/addon/lint/javascript-lint';
import 'codemirror/addon/lint/lint.css';

import Vue from 'vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    lineNumbers: true,
    mode: "javascript",
    gutters: ["CodeMirror-lint-markers"],
    lint: true
  });

var delay;
editor.on("change", function () {
    clearTimeout(delay);
    delay = setTimeout(updatePreview, 300);
});

function updatePreview() {
    var data = editor.getValue();
    var matches = data.match(/createCanvas\((.*),(.*)\)/);
    var canvasWidth = matches && matches[1] ? matches[1] : 100;
    var canvasHeight = matches && matches[2] ? matches[2] : 100;
    var previewFrame = document.getElementById('preview');
    previewFrame.style.width = canvasWidth + 'px';
    previewFrame.style.height = canvasHeight + 'px';
    var preview = previewFrame.contentDocument || previewFrame.contentWindow.document;
    var location = previewFrame.location || previewFrame.contentLocation || previewFrame.contentWindow.location;
    location.reload();
    preview.open();
    preview.write('<!DOCTYPE html><head><style>html,body{margin:0;padding:0}</style></' +
        'head><html><body><script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/p5.min.js" crossorigin=""></' +
        'script><script>' + editor.getValue() + '<' + '/script></' + 'body></html>');
    preview.close();
}
setTimeout(updatePreview, 300);

var input = document.getElementById("select");
input.onchange = selectTheme;

function selectTheme() {
    var theme = input.options[input.selectedIndex].textContent;
    editor.setOption("theme", theme);
    location.hash = "#" + theme;
}

var choice = (location.hash && location.hash.slice(1)) ||
    (document.location.search &&
        decodeURIComponent(document.location.search.slice(1)));
if (choice) {
    input.value = choice;
    editor.setOption("theme", choice);
}

CodeMirror.on(window, "hashchange", function () {
    var theme = location.hash.slice(1);
    if (theme) {
        input.value = theme;
        selectTheme();
    }
});
