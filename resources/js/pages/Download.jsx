import {useEffect, useState} from "react";
import axios from "axios";
import {download} from "../components/urls.jsx";
import Loader from "@/components/Loader.jsx";

const Download = ({id, value}) => {
    const [activeButtonId, setActiveButtonId] = useState(null);
    const [counter, setCounter] = useState(0);
    // Change this to your desired counter duration
    const handleButtonClick = () => {
        if (activeButtonId !== null) return; // Check if any button is currently active
        setActiveButtonId(id); // Set the active button to this button
        // Start the counter
        let currentCounter = 5;
        setCounter(currentCounter);

        const intervalId = setInterval(() => {
            currentCounter -= 1;
            setCounter(currentCounter);

            // When the counter hits zero, clear the interval and reset the active button
            if (currentCounter <= 0) {
                clearInterval(intervalId);
                setActiveButtonId(null);
                window.location.href = value.link; // Replace 'link' with the key representing the link in your 'value' object
            }
        }, 1000);
    };
    return (
        <button onClick={handleButtonClick} disabled={activeButtonId !== null}
                className={'download_btn_page box-shadow'}>
            {counter > 0 ? `Downloading ${counter}s` : value?.text}
        </button>
    );
}

const App = () => {
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


    return (
        <>
            {isError ? <div style={{textAlign: "center"}}><h1>Something went Wrong</h1></div> :
                isLoading ? <div className={'loader_screen'}><Loader/></div> :
                    <div className="container">
                        <div className="row my-5">
                            <div className="col-12 mx-auto">
                                <h1 className={'text-center'}>{downloadData?.title}</h1>
                                <div className={'text-center'}
                                     dangerouslySetInnerHTML={{__html: downloadData?.description}}></div>
                                <div className={'d-flex justify-content-center flex-column align-items-center'}>
                                    {Object.entries(downloadLinks).map(([key, value]) => (
                                        <Download key={key} id={key} value={value}/>
                                    ))}
                                </div>
                                <div className={'text-center pt-4'}
                                     dangerouslySetInnerHTML={{__html: downloadData?.main_content}}></div>
                            </div>
                        </div>
                    </div>}
        </>
    );
};

export default App;
