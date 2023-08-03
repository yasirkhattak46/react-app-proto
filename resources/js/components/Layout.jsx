import Navbar from "./Navbar";
import Footer from "./Footer";
import Router from "../Navigation/Routes";
import React from "react";
import {loadTheme} from "../components/urls.jsx";
export default function Layout() {
    loadTheme()
    return (
        <>
            <Navbar/>
            <Router/>
            <Footer/>
        </>
    )
}
