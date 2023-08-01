import {useEffect, useState} from "react";
import axios from "axios";
import {download} from "../components/urls.jsx";
import Loader from "@/components/Loader.jsx";

export default function Download() {

    const [downloadData, setDownloadData] = useState([]);
    const [downloadLinks, setDownloadLinks] = useState([]);
    const [isError, setIsError] = useState("");
    const [isLoading, setIsLoading] = useState(false);
    const getApiData = async () => {
        try {
            setIsLoading(true)
            const res = await axios.get(`${download}`)
            setDownloadData(res.data)
            setIsLoading(false)
        } catch (error) {
            console.log(error);
            setIsError(error)
        }
    }

    useEffect(() => {
        getApiData();
    }, [])

    useEffect(() => {
        if (typeof downloadData?.downloads !== 'undefined') {
            setDownloadLinks(JSON.parse(downloadData?.downloads))
        }
    }, [downloadData])
    console.log('data',downloadData)
    console.log('links',downloadLinks)
    return (
        <>
            {isError ? <div style={{textAlign: "center"}}><h1>Something went Wrong</h1></div> :
                isLoading ? <div className={'loader_screen'}><Loader/></div> :
                    <div className="container">
                <div className="row my-5">
                    <div className="col-12 mx-auto">
                        <h1 className={'text-center'}>{downloadData?.title}</h1>
                        <div className={'text-center'} dangerouslySetInnerHTML={{__html:downloadData?.description}}></div>
                        <div className={'d-flex justify-content-center flex-column align-items-center'}>
                            {Object.entries(downloadLinks).map(([key, value])=>(
                                <a key={key} href={value?.link}>
                                    <button
                                        className={'download_btn_page box-shadow'}>{value?.text}
                                    </button>
                                </a>
                            ))}
                        </div>
                        <div className={'text-center'} dangerouslySetInnerHTML={{__html:downloadData?.main_content}}></div>
                    </div>
                </div>
            </div>}
        </>);
}
