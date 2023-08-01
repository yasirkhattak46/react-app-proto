import {useParams} from "react-router-dom";
import axios from "axios";
import {blog, imagesUrl} from "@/components/urls.jsx";
import {useEffect, useState} from "react";
import Loader from "@/components/Loader.jsx";


export default function BlogDetail() {
    let {slug} = useParams();
    const [blogData, setBlogData] = useState("");
    const [isError, setIsError] = useState("");
    const [isLoading, setIsLoading] = useState(false);
    console.log(blogData)
    const getApiData = async () => {
        try {
            setIsLoading(true)
            const res = await axios.get(`${blog}/${slug}`)
            setBlogData(res.data)
            console.log(blogData);
            setIsLoading(false)
        } catch (error) {
            console.log(error);
            setIsError(error)
        }
    }

    useEffect(() => {
        getApiData();
    }, [])
    return (
        <>
            {isError ? <div style={{textAlign: "center"}}><h1>Something went Wrong</h1></div> :
                isLoading ? <div className={'loader_screen'}><Loader/></div> :
                    <div className="container">
                        <div className="row my-5">
                            <div className="col-12 mx-auto">
                                <img src={`${imagesUrl}/${blogData?.image}`} className="blog_detail_img" alt="..."/>
                                <h1>{blogData?.title}</h1>
                                <div dangerouslySetInnerHTML={{__html:blogData?.main_content}}></div>
                            </div>
                        </div>
                    </div>
            };
        </>
    )

}
