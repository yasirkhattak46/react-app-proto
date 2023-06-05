import ReactDOM from 'react-dom/client';
import Layout from "./components/Layout";
import {BrowserRouter} from "react-router-dom";

ReactDOM.createRoot(document.getElementById('app')).render(
    <BrowserRouter>
        <Layout/>
    </BrowserRouter>
);
