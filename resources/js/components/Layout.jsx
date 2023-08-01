import {BrowserRouter, Link, Route, Routes} from "react-router-dom";
import Navbar from "./Navbar";
import Footer from "./Footer";
import Router from "../Navigation/Routes";
export default function Layout() {
    return (
        <>
            <head>
                <Link rel={'icon'}/>
            </head>
            <Navbar/>
            <Router/>
            <Footer/>
        </>
    )
}
