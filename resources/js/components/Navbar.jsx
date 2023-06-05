import React from "react";
import {Link} from "react-router-dom";
export default function Navbar() {
    return (
        <div className="container">
            <nav className="navbar navbar-expand-lg navbar-light" style={{backgroundColor: "#e3f2fd"}}>
                <Link to="/youtube_extension_app" className="navbar-brand">React App</Link>
                <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse" id="navbarText">
                    <ul className="navbar-nav mr-auto">
                        <li className="nav-item active">
                            <Link to="/youtube_extension_app" className="nav-link">Home</Link>
                            <Link to="/youtube_extension_app/about" className="nav-link">About</Link>
                            <Link to="/youtube_extension_app/dynamic/1" className="nav-link">dynamic 1</Link>
                            <Link to="/youtube_extension_app/dynamic/2" className="nav-link">dynamic 2</Link>
                            <Link to="/youtube_extension_app/dynamic/2/ye wala page" className="nav-link">dynamic multi params</Link>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    );
};
