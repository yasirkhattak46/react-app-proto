export const base_url = initialStateFromServer.app_url
export const base_api_url = base_url + "/api"
export const getHomeData = base_api_url + "/homeData"
export const blog = base_api_url + "/blog"
export const blogs = base_api_url + "/blogs"
export const download = base_api_url + "/download"
export const imagesUrl = base_url + "/public/assets/images/"


export const loadTheme = () => {
    //alert('sfda');
    let doc_root = document.querySelector(':root');
    doc_root.style.setProperty('--bg', '#fff');
    doc_root.style.setProperty('--primary-color', initialStateFromServer.settings.primary_color);
    doc_root.style.setProperty('--secondary-color', initialStateFromServer.settings.secondary_color);
}
