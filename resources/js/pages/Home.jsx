import Blog from "../components/Blog.jsx";
import {useEffect, useState} from "react";
import {getHomeData, imagesUrl} from '../components/urls.jsx'
import axios from "axios";
import Loader from "@/components/Loader.jsx";


export default function Home() {
    const [homeData, setHomeData] = useState([]);
    const [icons, setIcons] = useState([]);
    const [featureIcons, setFeatureIcons] = useState([]);
    const [colorContent, setColorContent] = useState([]);
    const [faqs, setFaqs] = useState([]);
    const [appsIcons, setAppsIcons] = useState([]);
    const [isError, setIsError] = useState("");
    const [isLoading, setIsLoading] = useState(false);

    const getApiData = async () => {
        try {
            setIsLoading(true)
            const res = await axios.get(getHomeData)
            setHomeData(res.data)
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
        if (typeof homeData?.hero?.icons !== 'undefined') {
            setIcons(JSON.parse(homeData.hero.icons))
            setFeatureIcons(JSON.parse(homeData?.feature?.icons))
            setColorContent(JSON.parse(homeData?.multiSec?.color_content))
            setAppsIcons(JSON.parse(homeData?.multiSec?.apps_icon))
            setFaqs(JSON.parse(homeData?.multiSec?.faqs))
        }
    }, [homeData])
    console.log('blogs', homeData?.blogs)
    // console.log('homedata', homeData)
    return (
        <>
            {isError ? <div style={{textAlign: "center"}}><h1>Something went Wrong</h1></div> :
                isLoading ? <div className={'loader_screen'}><Loader/></div> :
                    <div>
                        <div className="container">
                            <div className="row py-5">
                                <div className="col-lg-8 col-sm-12 cl-md-12 pt-3">
                                    <h1 className={'title-text'}> {homeData?.hero?.title}</h1>
                                    <p style={{fontSize: "40px"}}>{homeData?.hero?.sub_title}</p>
                                    <a href={homeData?.hero?.btn_link}>
                                        <button
                                            className={'download_btn box-shadow'}>{homeData?.hero?.btn_text}</button>
                                    </a>
                                    <div className={'row pt-5 mr-2'}>
                                        <div className={'col-12'}>
                                            <h3>{homeData?.hero?.icon_title}</h3>
                                        </div>
                                        {icons.map((icon) => (
                                            <div className={'col text-center box-shadow p-2 m-2'} key={icon.image}>
                                                <img src={`${imagesUrl}${icon.image}`}></img>
                                                <p className={'p-1'} style={{display: 'inline'}}>{icon.text}</p>
                                            </div>
                                        ))}
                                        <div className={'py-4'}>
                                            <p className={'fs-5'}>
                                                {homeData?.hero?.description}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-4 col-sm-12 cl-md-12 ">
                                    <img src={`${imagesUrl}${homeData?.hero?.banner}`} className={'banner_img'}/>
                                </div>
                            </div>
                            <div className={'row'}>
                                <div dangerouslySetInnerHTML={{__html: homeData?.feature?.main_content}}
                                     className={'col-12 text-center '}>
                                </div>
                            </div>
                            <div className={'row text-center pt-5'}>
                                <h2 className={'fw-bold'}>{homeData?.feature?.icons_title}</h2>
                                <div className={'feature_section pt-4 text-center'}>
                                    {Object.entries(featureIcons).map(([key, value]) => (
                                        <div key={key}>
                                            <div className={'feature_circle'}>
                                                <img src={`${imagesUrl}${value.image}`}/>
                                            </div>
                                            <h6>{value.text}</h6>
                                        </div>

                                    ))}
                                </div>
                            </div>
                            {colorContent.map((value) => (
                                <div className={'detail_sec box-shadow'} dangerouslySetInnerHTML={{__html: value}}>
                                </div>
                            ))}
                            <div className={'row text-center'}>
                                <h2 className={'fw-bold fs-1'}>{homeData?.multiSec?.apps_title}</h2>
                                <div className={'app_section pt-4 text-center'}>
                                    {appsIcons.map((value, index) => (
                                        <a href={'https://youtube.com/'} className={'m-4'} key={index}>
                                            <div>
                                                <div className={'icon_circle'}>
                                                    <img className={'icon_img'} src={`${imagesUrl}${value.image}`}/>
                                                </div>
                                                <h6>{value.text}</h6>
                                            </div>
                                        </a>
                                    ))}
                                </div>
                            </div>
                        </div>
                        <div className={'faqs_section'}>
                            <div className={'container'}>
                                <h2 className={'text-light fw-bold fs-1'}>{homeData?.multiSec?.faq_title}</h2>
                                {faqs.map((value, index) => (
                                    <div className={"faq-list"} key={index}>
                                        <div className={"faq_title"}>
                                            <span>{index + 1}</span>
                                            <font>{value.question}</font>
                                        </div>
                                        <div className={"py-3"}>
                                            <div className={"bl-text"}>
                                                <div className={"answ"}>
                                                    <p className={'m-0'}>
                                                        {value.answer}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                ))}
                            </div>
                        </div>
                        <div className={'main_content'} dangerouslySetInnerHTML={{__html: homeData?.multiSec?.content}}>

                        </div>
                        <section className={'container h-blog-sec py-5'}>
                            <div className={'h-blog-title text-center'}>
                                <h1 className={'fw-bold fs-1'}>Latest Blog Post</h1>
                            </div>
                            <div className={'row pt-3'}>

                                {homeData?.blogs?.map((value, index) => (
                                    <div className={'col-lg-6 col-md-12 p-3'} key={index}>
                                        <Blog blogdata={value}/>
                                    </div>
                                ))}

                            </div>
                        </section>
                    </div>
            }
        </>

    );
}
