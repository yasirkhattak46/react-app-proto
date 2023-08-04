import React from "react";
import logo from '../assets/images/logo.png'
import GoogleTranslator from "@/components/GoogleTranslator.jsx";
import Container from "react-bootstrap/Container";
import Navbar1 from "react-bootstrap/Navbar";
import Nav from "react-bootstrap/Nav";
import {LinkContainer} from 'react-router-bootstrap'


export default function Navbar() {
    window.googleTranslateElementInit();
    return (
        <div className="container p-0">
            <nav className="navbar main-nav navbar-expand-lg">
                <a className="navbar-brand" href="#"><img className={'logo'} src={logo} alt={''}></img></a>
                <div className="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                    <Navbar1 expand="lg" className="">
                        <Container>
                            <Navbar1.Toggle className="navbar-toggler" aria-controls="basic-navbar-nav" />
                            <Navbar1.Collapse id="basic-navbar-nav">
                                <Nav className="me-auto navbar-nav">
                                    <LinkContainer to="/GbWhatsApp/">
                                        <Nav.Link className="nav-link">Home</Nav.Link>
                                    </LinkContainer>
                                    <LinkContainer to="/GbWhatsApp/blogs">
                                        <Nav.Link className="nav-link">Blog</Nav.Link>
                                    </LinkContainer>
                                    <LinkContainer to="/GbWhatsApp/download">
                                        <Nav.Link className="nav-link">Download</Nav.Link>
                                    </LinkContainer>
                                </Nav>
                            </Navbar1.Collapse>
                        </Container>
                    </Navbar1>
                    <div id={'multiLang'}>
                        <GoogleTranslator/>
                    </div>
                </div>
            </nav>
            <div id={'home_bg'}></div>
        </div>
    );
};
