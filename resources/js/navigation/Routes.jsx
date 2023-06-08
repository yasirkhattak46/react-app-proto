import { Routes, Route } from "react-router-dom";
import Home from "../pages/Home";
import Dynamic from "../pages/Dynamic";
import Download from "../pages/Download";
import Blogs from "../pages/Blogs.jsx";

const base_url = "/react-app-proto"
export default function Router() {
    return (
        <Routes>
            <Route path="/react-app-proto" element={<Home />}/>
            <Route path="/react-app-proto/Blogs" element={<Blogs />} />
            <Route path="/react-app-proto/Download" element={<Download />} />
            <Route path="/react-app-proto/dynamic/:id" element={<Dynamic />} />
            <Route path="/react-app-proto/dynamic/:id/:page" element={<Dynamic />} />
        </Routes>
    );
}

