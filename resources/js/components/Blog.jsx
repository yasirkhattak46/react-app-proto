import {Link} from "react-router-dom";
import {base_url, blog, imagesUrl} from "@/components/urls.jsx";

const Blog = (props) => {
    return (
        <>
            <div className={"card mb-3 box-shadow blog_card"}>
                <div className={"row g-0 h-100"}>
                    <div className={"col-md-4"}>
                        <img src={`${imagesUrl}${props?.blogdata?.image}`} className="blog_img" alt="..."/>
                    </div>
                    <div className={"col-md-8"}>
                        <div className={"card-body"}>
                            <h5 className={"card-title"}>{props?.blogdata?.title}</h5>
                            <div dangerouslySetInnerHTML={{__html:props?.blogdata?.main_content?.slice(0, 300) }} className={"card-text"}></div>
                            <Link className={'blog_read_more'} to={`${base_url}/blog/${props?.blogdata?.slug}`}>Read More</Link>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};
export default Blog
