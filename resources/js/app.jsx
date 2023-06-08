import ReactDOM from 'react-dom/client';
import Layout from "./components/Layout";
import {BrowserRouter} from "react-router-dom";
import $ from 'jquery';
import 'bootstrap/dist/css/bootstrap.min.css';
import "bootstrap/dist/js/bootstrap.min.js";


ReactDOM.createRoot(document.getElementById('app')).render(
    <BrowserRouter>
        <Layout/>
    </BrowserRouter>
);
