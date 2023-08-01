import { Routes, Route } from "react-router-dom";
import Home from "../pages/Home";
import Download from "../pages/Download";
import Blogs from "../pages/Blogs.jsx";
import BlogDetail from "@/pages/BlogDetail.jsx";

const base_url = "GbWhatsApp"
export default function Router() {
    return (
        <Routes>
            <Route path={base_url} element={<Home />}/>
            <Route path={`${base_url}/Blogs`} element={<Blogs />} />
            <Route path={`${base_url}/Download`} element={<Download />} />
            <Route path={`${base_url}/blog/:slug`} element={<BlogDetail />} />
        </Routes>
    );
}

