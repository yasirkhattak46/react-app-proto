import {Link} from "react-router-dom";
import blog_image from '../../../public/assets/images/blog.jpg'
export default function Blog() {
    return (
        <>
            <div className={"card mb-3 box-shadow"}>
                <div className={"row g-0"}>
                    <div className={"col-md-4"}>
                        <img src={blog_image} className="blog_img" alt="..."/>
                    </div>
                    <div className={"col-md-8"}>
                        <div className={"card-body"}>
                            <h5 className={"card-title"}>Free Download Vijay Deverakonda's Hindi Dubbed Movies</h5>
                            <p className={"card-text"}>This is a wider card with supporting text below as a
                                natural
                                lead-in to additional content. This content is a little bit longer.</p>
                            <Link className={'blog_read_more'} to={'/react-app-proto/url'} >Read More</Link>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};
