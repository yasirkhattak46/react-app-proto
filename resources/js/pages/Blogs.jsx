import Blog from "@/components/Blog.jsx";

export default function Blogs() {
    return  <section className={'container h-blog-sec py-5'}>
        <div className={'h-blog-title text-center'}>
            <h1 className={'fw-bold fs-1'}>Latest Blog Post</h1>
        </div>
        <div className={'row pt-3'}>
            <div className={'col-lg-6 col-md-12 p-3'}>
                <Blog/>
            </div>
            <div className={'col-lg-6 col-md-12 p-3'}>
                <Blog/>
            </div>
            <div className={'col-lg-6 col-md-12 p-3'}>
                <Blog/>
            </div>
            <div className={'col-lg-6 col-md-12 p-3'}>
                <Blog/>
            </div>

        </div>
    </section>;
}
