import hero_image from '../../../public/assets/images/hero.png'
import icon1 from '../../../public/assets/images/icon1.png'
import icon2 from '../../../public/assets/images/icon2.png'
import icon3 from '../../../public/assets/images/icon3.png'
import feature1 from '../../../public/assets/images/s31.png'
import feature2 from '../../../public/assets/images/s32.png'
import feature3 from '../../../public/assets/images/s33.png'
import feature4 from '../../../public/assets/images/s34.png'
import feature5 from '../../../public/assets/images/s35.png'
import auto_reply from '../../../public/assets/images/autoreply1.png'
import yt from '../../../public/assets/images/yt.png'
import tiktok from '../../../public/assets/images/tiktok.png'
import insta from '../../../public/assets/images/insta.png'
import Blog from "../components/Blog.jsx";


export default function Home() {

    return (
        <>
            <div className="container">
                <div className="row py-5">
                    <div className="col-lg-8 col-sm-12 cl-md-12 pt-3">
                        <h1 className={'title-text'}> GB WhatsApp</h1>
                        <h1 className={'title-text'}>Download Latest versions </h1>
                        <p style={{fontSize: "40px"}}>(Official Anti Ban)</p>
                        <button className={'download_btn box-shadow'}>Download APK</button>

                        <div className={'row pt-5 mr-2'}>
                            <div className={'col-12'}>
                                <h3>Security Verified</h3>
                            </div>
                            <div className={'col text-center box-shadow p-2 m-2'}>
                                <img src={icon1}></img>
                                <p className={'p-1'} style={{display: 'inline'}}>CM Security</p>
                            </div>
                            <div className={'col text-center box-shadow p-2 m-2'}>
                                <img src={icon2}></img>
                                <p className={'p-1'} style={{display: 'inline'}}>Lookout</p>
                            </div>
                            <div className={'col text-center box-shadow p-2 m-2'}>
                                <img src={icon3}></img>
                                <p className={'p-1'} style={{display: 'inline'}}>MCAfee</p>
                            </div>
                            <div className={'py-4'}>
                                <p className={'fs-5'}>
                                    GB Whatsapp is completely secure, having been validated by numerous antivirus and
                                    malware
                                    detection systems. Feel at ease when using GBWhatsapp, as you can check each update
                                    using
                                    these platforms, ensuring a worry-free experience!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div className="col-lg-4 col-sm-12 cl-md-12 text-center">
                        <img src={hero_image} className={''}/>
                    </div>
                </div>
                <div className={'row'}>
                    <div className={'col-12 text-center '}>
                        <h2 className={'fw-bold py-3'}>GB Whatsapp</h2>
                        <p className={'fs-5'}>GB Whatsapp is an unofficial, modified version of the popular messaging
                            app,
                            WhatsApp, that offers additional
                            features and customization options not available in the official application. While it has
                            gained
                            popularity for its enhanced functionality, such as increased file size limits, multiple
                            accounts,
                            and theme customization, it also raises significant concerns related to user privacy and
                            security,
                            as it is not endorsed by WhatsApp and is not available on official app stores. As a result,
                            users
                            who opt for GB WhatsApp put themselves at risk of data breaches and potential account bans,
                            as
                            it
                            violates WhatsApp's terms of service.</p>
                    </div>
                </div>
                <div className={'row text-center pt-5'}>
                    <h2 className={'fw-bold'}>Features</h2>
                    <div className={'feature_section pt-4 text-center'}>
                        <div>
                            <div className={'feature_circle '}>
                                <img src={feature1}/>
                            </div>
                            <h6>Hide Online Status</h6>
                        </div>
                        <div>
                            <div className={'feature_circle'}>
                                <img src={feature2}/>
                            </div>
                            <h6>Hide Online Status</h6>
                        </div>
                        <div>
                            <div className={'feature_circle'}>
                                <img src={feature3}/>
                            </div>
                            <h6>Hide Online Status</h6>
                        </div>
                        <div>
                            <div className={'feature_circle'}>
                                <img src={feature4}/>
                            </div>
                            <h6>Hide Online Status</h6>
                        </div>
                        <div>
                            <div className={'feature_circle'}>
                                <img src={feature5}/>
                            </div>
                            <h6>Hide Online Status</h6>
                        </div>
                    </div>
                </div>
                <div className={'detail_sec box-shadow'}>
                    <h2 className={'text-light pt-5 pb-2 fs-1 fw-bold'}>Auto Reply</h2>
                    <p className={'fs-4 px-5 text-light'}>
                        GB WhatsApp's auto-reply feature enables users to set custom automatic responses for incoming
                        messages,
                        ensuring timely communication even when they are unavailable. This functionality is particularly
                        useful
                        for businesses, allowing them to efficiently manage customer inquiries and provide instant
                        replies.
                        Additionally, the auto-reply feature can be customized with specific triggers, ensuring that
                        responses
                        are tailored to the content of the message.
                    </p>
                    <img src={auto_reply}/>
                </div>
                <div className={'detail_sec box-shadow'}>
                    <h2 className={'text-light pt-5 pb-2 fs-1 fw-bold'}>Auto Reply</h2>
                    <p className={'fs-4 px-5 text-light'}>
                        GB WhatsApp's auto-reply feature enables users to set custom automatic responses for incoming
                        messages,
                        ensuring timely communication even when they are unavailable. This functionality is particularly
                        useful
                        for businesses, allowing them to efficiently manage customer inquiries and provide instant
                        replies.
                        Additionally, the auto-reply feature can be customized with specific triggers, ensuring that
                        responses
                        are tailored to the content of the message.
                    </p>
                    <img src={auto_reply}/>
                </div>
                <div className={'detail_sec box-shadow'}>
                    <h2 className={'text-light pt-5 pb-2 fs-1 fw-bold'}>Auto Reply</h2>
                    <p className={'fs-4 px-5 text-light'}>
                        GB WhatsApp's auto-reply feature enables users to set custom automatic responses for incoming
                        messages,
                        ensuring timely communication even when they are unavailable. This functionality is particularly
                        useful
                        for businesses, allowing them to efficiently manage customer inquiries and provide instant
                        replies.
                        Additionally, the auto-reply feature can be customized with specific triggers, ensuring that
                        responses
                        are tailored to the content of the message.
                    </p>
                    <img src={auto_reply}/>
                </div>
                <div className={'row text-center'}>
                    <h2 className={'fw-bold fs-1'}>Other Apps</h2>
                    <div className={'app_section pt-4 text-center'}>
                        <a href={'https://youtube.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={yt}/>
                                </div>
                                <h6>Youtube</h6>
                            </div>
                        </a>
                        <a href={'https://www.tiktok.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={tiktok}/>
                                </div>
                                <h6>Tiktok</h6>
                            </div>
                        </a>
                        <a href={'https://www.instagram.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={insta}/>
                                </div>
                                <h6>Instagram</h6>
                            </div>
                        </a>
                        <a href={'https://youtube.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={yt}/>
                                </div>
                                <h6>Youtube</h6>
                            </div>
                        </a>
                        <a href={'https://www.tiktok.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={tiktok}/>
                                </div>
                                <h6>Tiktok</h6>
                            </div>
                        </a>
                        <a href={'https://www.instagram.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={insta}/>
                                </div>
                                <h6>Instagram</h6>
                            </div>
                        </a>
                        <a href={'https://youtube.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={yt}/>
                                </div>
                                <h6>Youtube</h6>
                            </div>
                        </a>
                        <a href={'https://www.tiktok.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={tiktok}/>
                                </div>
                                <h6>Tiktok</h6>
                            </div>
                        </a>
                        <a href={'https://www.instagram.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={insta}/>
                                </div>
                                <h6>Instagram</h6>
                            </div>
                        </a>
                        <a href={'https://youtube.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={yt}/>
                                </div>
                                <h6>Youtube</h6>
                            </div>
                        </a>
                        <a href={'https://www.tiktok.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={tiktok}/>
                                </div>
                                <h6>Tiktok</h6>
                            </div>
                        </a>
                        <a href={'https://www.instagram.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={insta}/>
                                </div>
                                <h6>Instagram</h6>
                            </div>
                        </a>
                        <a href={'https://youtube.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={yt}/>
                                </div>
                                <h6>Youtube</h6>
                            </div>
                        </a>
                        <a href={'https://www.tiktok.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={tiktok}/>
                                </div>
                                <h6>Tiktok</h6>
                            </div>
                        </a>
                        <a href={'https://www.instagram.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={insta}/>
                                </div>
                                <h6>Instagram</h6>
                            </div>
                        </a>
                        <a href={'https://youtube.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={yt}/>
                                </div>
                                <h6>Youtube</h6>
                            </div>
                        </a>
                        <a href={'https://www.tiktok.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={tiktok}/>
                                </div>
                                <h6>Tiktok</h6>
                            </div>
                        </a>
                        <a href={'https://www.instagram.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={insta}/>
                                </div>
                                <h6>Instagram</h6>
                            </div>
                        </a>
                        <a href={'https://youtube.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={yt}/>
                                </div>
                                <h6>Youtube</h6>
                            </div>
                        </a>
                        <a href={'https://www.tiktok.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={tiktok}/>
                                </div>
                                <h6>Tiktok</h6>
                            </div>
                        </a>
                        <a href={'https://www.instagram.com/'} className={'m-4'}>
                            <div>
                                <div className={'icon_circle'}>
                                    <img className={'icon_img'} src={insta}/>
                                </div>
                                <h6>Instagram</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div className={'faqs_section'}>
                <div className={'container'}>
                    <h2 className={'text-light fw-bold fs-1'}>FAQ</h2>
                    <div className={"faq-list"}>
                        <div className={"faq_title"}>
                            <span>1</span>
                            <font>What is GB Whatsapp?</font>
                        </div>
                        <div className={"py-3"}>
                            <div className={"bl-text"}>
                                <div className={"answ"}>
                                    <p className={'m-0'}>
                                        GB WhatsApp is a modified, unofficial version of the popular
                                        messaging
                                        app
                                        WhatsApp, boasting additional features and customization options
                                        beyond
                                        the
                                        original app. However, it poses security risks and potential privacy
                                        breaches as it is not developed or supported by WhatsApp Inc.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className={"faq-list"}>
                        <div className={"faq_title"}>
                            <span>1</span>
                            <font>What is GB Whatsapp?</font>
                        </div>
                        <div className={"py-3"}>
                            <div className={"bl-text"}>
                                <div className={"answ"}>
                                    <p className={'m-0'}>
                                        GB WhatsApp is a modified, unofficial version of the popular
                                        messaging
                                        app
                                        WhatsApp, boasting additional features and customization options
                                        beyond
                                        the
                                        original app. However, it poses security risks and potential privacy
                                        breaches as it is not developed or supported by WhatsApp Inc.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className={"faq-list"}>
                        <div className={"faq_title"}>
                            <span>1</span>
                            <font>What is GB Whatsapp?</font>
                        </div>
                        <div className={"py-3"}>
                            <div className={"bl-text"}>
                                <div className={"answ"}>
                                    <p className={'m-0'}>
                                        GB WhatsApp is a modified, unofficial version of the popular
                                        messaging
                                        app
                                        WhatsApp, boasting additional features and customization options
                                        beyond
                                        the
                                        original app. However, it poses security risks and potential privacy
                                        breaches as it is not developed or supported by WhatsApp Inc.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className={"faq-list"}>
                        <div className={"faq_title"}>
                            <span>1</span>
                            <font>What is GB Whatsapp?</font>
                        </div>
                        <div className={"py-3"}>
                            <div className={"bl-text"}>
                                <div className={"answ"}>
                                    <p className={'m-0'}>
                                        GB WhatsApp is a modified, unofficial version of the popular
                                        messaging
                                        app
                                        WhatsApp, boasting additional features and customization options
                                        beyond
                                        the
                                        original app. However, it poses security risks and potential privacy
                                        breaches as it is not developed or supported by WhatsApp Inc.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section className={'container h-blog-sec py-5'}>
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
            </section>
        </>);
}
