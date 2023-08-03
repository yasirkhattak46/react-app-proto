import React from 'react';
import ReactDOM from 'react-dom/client';
import Layout from "./components/Layout";
import { BrowserRouter } from "react-router-dom";
import $ from 'jquery';
import 'bootstrap/dist/css/bootstrap.min.css';
import "bootstrap/dist/js/bootstrap.min.js";

// Your googleTranslateElementInit function
window.googleTranslateElementInit = function() {
    new window.google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'en,az,bn,pt,fr,de,id,it,ja,ms,ur,fa,pa,ru,ar,es,ta,te,th,tr,vi',
        layout: google.translate.TranslateElement.InlineLayout.VERTICAL,
        // autoDisplay: false, // Set this to 'true' if you want the translation to be displayed automatically
    }, 'google_translate_element');
};


ReactDOM.createRoot(document.getElementById('app')).render(
    <BrowserRouter>
        <Layout />
    </BrowserRouter>
);
