import {useEffect, useState} from "react";
import axios from "axios";
import {blogs} from "../components/urls.jsx";
import Loader from "@/components/Loader.jsx";
import Blog from "../components/Blog.jsx";

export default function Blogs() {
    const [blogsData, setBlogsData] = useState([]);
    const [isError, setIsError] = useState("");
    const [isLoading, setIsLoading] = useState(false);
    const getApiData = async () => {
        try {
            setIsLoading(true)
            const res = await axios.get(`${blogs}`)
            setBlogsData(res.data)
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
            {
                isError ? <div style={{textAlign: "center"}}><h1>Something went Wrong</h1></div> :
                    isLoading ? <div className={'loader_screen'}><Loader/></div> :
                        <section className={'container h-blog-sec py-5'}>
                            <div className={'h-blog-title text-center'}>
                                <h1 className={'fw-bold fs-1'}>Latest Blog Post</h1>
                            </div>
                            <div className={'row pt-3'}>
                                {blogsData?.map((value, index)=>(
                                    <div className={'col-lg-6 col-md-12 p-3'} key={index}>
                                        <Blog blogdata={value}/>
                                    </div>
                                ))}


                            </div>
                        </section>

            }
        </>
    );
}
