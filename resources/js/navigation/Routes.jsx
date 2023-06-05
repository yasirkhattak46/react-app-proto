import { Routes, Route } from "react-router-dom";
import Home from "../pages/Home";
import About from "../pages/About";
import Dynamic from "../pages/Dynamic";

const base_url = "/youtube_extension_app"
export default function Router() {
    return (
        <Routes>
            <Route path="/youtube_extension_app" element={<Home />}/>
            <Route path="/youtube_extension_app/about" element={<About />} />
            <Route path="/youtube_extension_app/dynamic/:id" element={<Dynamic />} />
            <Route path="/youtube_extension_app/dynamic/:id/:page" element={<Dynamic />} />
        </Routes>
    );
}

