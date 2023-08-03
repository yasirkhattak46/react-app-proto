import React from "react";
import logo from '../assets/images/logo.png'
import {Link} from "react-router-dom";
import GoogleTranslator from "@/components/GoogleTranslator.jsx";


export default function Navbar() {
    window.googleTranslateElementInit();
    return (
        <div className="container">
            <nav className="navbar main-nav navbar-expand-lg">
                <a className="navbar-brand" href="#"><img className={'logo'} src={logo} alt={''}></img></a>
                <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                    <ul className="navbar-nav">
                        <li className="nav-item active">
                            <Link to={'/GbWhatsApp'} className="nav-link" href="#">Home</Link>
                        </li>
                        <li className="nav-item">
                            <Link to={'GbWhatsApp/blogs'} className="nav-link" href="#">Blog</Link>
                        </li>
                        <li className="nav-item">
                            <Link to={'GbWhatsApp/download'} className="nav-link" href="#">Download</Link>
                        </li>
                    </ul>
                    <div id={'multiLang'}>
                    <GoogleTranslator/>
                    </div>
                </div>
            </nav>
            <div id={'home_bg'}></div>
        </div>
    );
};
